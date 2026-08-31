<?php
// api/config.php
// Configuración del backend PHP. Equivalente al .env que usaba el backend Node.
//
// IMPORTANTE: cambia JWT_SECRET por un valor propio y aleatorio antes de subir
// el sitio a un hosting real, y cambia la contraseña del admin desde el panel
// (tarjeta "Gestión de Seguridad y Usuarios" en dashboard.php) después de tu
// primer inicio de sesión.

return [
    // Debe ser un secreto largo y aleatorio en producción.
    'JWT_SECRET' => 'mq2026_2fD9!kLp$8vXqZr4tY7wA1nC6sJb_secreto_super_seguro',
    'JWT_EXPIRES_IN' => 8 * 60 * 60, // 8 horas, igual que antes

    // Usados únicamente por seed.php para crear/actualizar el usuario admin.
    'ADMIN_USER' => 'admin',
    'ADMIN_PASSWORD' => 'MateoQuinto2026!',
];
