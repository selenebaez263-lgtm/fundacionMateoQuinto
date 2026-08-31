<?php
// api/db.php
// Conexión a SQLite vía PDO y definición de tablas.
// Equivalente en PHP de backend/config/db.js (misma base de datos, mismo esquema).

$dbFile = __DIR__ . '/../data/mateo_quinto.db';

if (!is_dir(dirname($dbFile))) {
    mkdir(dirname($dbFile), 0775, true);
}

try {
    $pdo = new PDO('sqlite:' . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->exec('PRAGMA journal_mode = WAL;');
    $pdo->exec('PRAGMA foreign_keys = ON;');
} catch (PDOException $e) {
    http_response_code(500);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['error' => 'No se pudo conectar a la base de datos.']);
    exit;
}

// Tabla de administradores
$pdo->exec("
CREATE TABLE IF NOT EXISTS admin_users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  usuario TEXT UNIQUE NOT NULL,
  password_hash TEXT NOT NULL,
  creado_en TEXT DEFAULT CURRENT_TIMESTAMP
);
");

// Tabla de proyectos
$pdo->exec("
CREATE TABLE IF NOT EXISTS proyectos (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  titulo TEXT NOT NULL,
  descripcion TEXT,
  imagen_id INTEGER,
  activo INTEGER DEFAULT 1,
  orden INTEGER DEFAULT 0,
  creado_en TEXT DEFAULT CURRENT_TIMESTAMP,
  actualizado_en TEXT DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (imagen_id) REFERENCES imagenes(id)
);
");

// Tabla de imágenes y video
$pdo->exec("
CREATE TABLE IF NOT EXISTS imagenes (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  nombre_archivo TEXT NOT NULL,
  ruta TEXT NOT NULL,
  descripcion TEXT,
  tipo TEXT NOT NULL DEFAULT 'imagen',
  subida_en TEXT DEFAULT CURRENT_TIMESTAMP
);
");

// Tabla de textos editables por página/sección
$pdo->exec("
CREATE TABLE IF NOT EXISTS contenido_paginas (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  pagina TEXT NOT NULL,
  seccion TEXT NOT NULL,
  contenido TEXT,
  actualizado_en TEXT DEFAULT CURRENT_TIMESTAMP,
  UNIQUE(pagina, seccion)
);
");

// Tabla de donativos (intención de donativo, registrada antes de ir a Stripe)
$pdo->exec("
CREATE TABLE IF NOT EXISTS donaciones (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  nombre TEXT,
  email TEXT,
  monto REAL NOT NULL,
  creado_en TEXT DEFAULT CURRENT_TIMESTAMP
);
");

// Tabla de voluntariado
$pdo->exec("
CREATE TABLE IF NOT EXISTS voluntarios (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  nombre TEXT NOT NULL,
  email TEXT NOT NULL,
  telefono TEXT,
  mensaje TEXT,
  creado_en TEXT DEFAULT CURRENT_TIMESTAMP
);
");

// Tabla de estudiantes en prácticas / estadía
$pdo->exec("
CREATE TABLE IF NOT EXISTS practicantes (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  usuario TEXT UNIQUE NOT NULL,
  password_hash TEXT NOT NULL,
  nombre_completo TEXT NOT NULL,
  escuela TEXT,
  carrera TEXT,
  cuatrimestre TEXT,
  supervisor TEXT,
  fecha_inicio TEXT,
  fecha_fin TEXT,
  horas_requeridas INTEGER DEFAULT 0,
  activo INTEGER DEFAULT 1,
  creado_en TEXT DEFAULT CURRENT_TIMESTAMP
);
");

// Bitácora de actividades y horas de cada practicante
$pdo->exec("
CREATE TABLE IF NOT EXISTS practicante_actividades (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  practicante_id INTEGER NOT NULL,
  fecha TEXT NOT NULL,
  descripcion TEXT NOT NULL,
  horas REAL NOT NULL DEFAULT 0,
  registrado_por TEXT,
  creado_en TEXT DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (practicante_id) REFERENCES practicantes(id)
);
");

return $pdo;
