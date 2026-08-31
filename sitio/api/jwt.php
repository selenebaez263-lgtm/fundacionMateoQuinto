<?php
// api/jwt.php
// Implementación mínima de JWT (HS256) en PHP puro, sin librerías externas.
// Compatible en formato con los tokens que antes generaba jsonwebtoken (Node).

function jwt_base64url_encode(string $data): string
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function jwt_base64url_decode(string $data): string
{
    $remainder = strlen($data) % 4;
    if ($remainder) {
        $data .= str_repeat('=', 4 - $remainder);
    }
    return base64_decode(strtr($data, '-_', '+/'));
}

function jwt_encode(array $payload, string $secret, int $expiresInSeconds = 28800): string
{
    $header = ['alg' => 'HS256', 'typ' => 'JWT'];
    $payload['iat'] = time();
    $payload['exp'] = time() + $expiresInSeconds;

    $segments = [
        jwt_base64url_encode(json_encode($header)),
        jwt_base64url_encode(json_encode($payload)),
    ];

    $signingInput = implode('.', $segments);
    $signature = hash_hmac('sha256', $signingInput, $secret, true);
    $segments[] = jwt_base64url_encode($signature);

    return implode('.', $segments);
}

/**
 * Devuelve el payload (array) si el token es válido y no ha expirado, o null si no.
 */
function jwt_decode(?string $token, string $secret): ?array
{
    if (!$token) return null;

    $parts = explode('.', $token);
    if (count($parts) !== 3) return null;

    [$headerB64, $payloadB64, $signatureB64] = $parts;

    $signingInput = "$headerB64.$payloadB64";
    $expectedSignature = jwt_base64url_encode(hash_hmac('sha256', $signingInput, $secret, true));

    if (!hash_equals($expectedSignature, $signatureB64)) {
        return null;
    }

    $payload = json_decode(jwt_base64url_decode($payloadB64), true);
    if (!is_array($payload)) return null;

    if (isset($payload['exp']) && time() > $payload['exp']) {
        return null; // token expirado
    }

    return $payload;
}
