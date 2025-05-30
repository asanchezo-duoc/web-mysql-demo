<?php
require_once 'config/database.php';

try {
    // Obtener servicios
    $stmt = $conn->query("SELECT * FROM servicios");
    $servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Obtener testimonios
    $stmt = $conn->query("SELECT * FROM testimonios");
    $testimonios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Obtener equipo
    $stmt = $conn->query("SELECT * FROM equipo");
    $equipo = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
    die();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios TI LTDA - Soluciones Tecnológicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('img/hero-bg.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            color: white;
        }
        .service-card {
            transition: transform 0.3s;
        }
        .service-card:hover {
            transform: translateY(-10px);
        }
        .testimonial-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
        }
        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }
        .team-member img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Servicios TI LTDA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#inicio">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#equipo">Equipo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonios">Testimonios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="inicio" class="hero-section">
        <div class="container text-center">
            <h1 class="display-4">Transformando el Futuro Digital</h1>
            <p class="lead">Soluciones tecnológicas innovadoras para impulsar tu negocio</p>
            <a href="#contacto" class="btn btn-primary btn-lg">Contáctanos</a>
        </div>
    </section>

    <!-- Servicios -->
    <section id="servicios" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Nuestros Servicios</h2>
            <div class="row">
                <?php foreach($servicios as $servicio): ?>
                <div class="col-md-3 mb-4">
                    <div class="card service-card h-100">
                        <div class="card-body text-center">
                            <i class="<?php echo $servicio['icono']; ?> fa-3x mb-3"></i>
                            <h5 class="card-title"><?php echo $servicio['nombre']; ?></h5>
                            <p class="card-text"><?php echo $servicio['descripcion']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Equipo -->
    <section id="equipo" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Nuestro Equipo</h2>
            <div class="row">
                <?php foreach($equipo as $miembro): ?>
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="img/<?php echo $miembro['imagen']; ?>" alt="<?php echo $miembro['nombre']; ?>">
                        <h4><?php echo $miembro['nombre']; ?></h4>
                        <p class="text-muted"><?php echo $miembro['cargo']; ?></p>
                        <p><?php echo $miembro['descripcion']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Testimonios -->
    <section id="testimonios" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Lo que dicen nuestros clientes</h2>
            <div class="row">
                <?php foreach($testimonios as $testimonio): ?>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <img src="img/<?php echo $testimonio['imagen']; ?>" alt="<?php echo $testimonio['nombre_cliente']; ?>" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
                        <p class="mb-3"><?php echo $testimonio['testimonio']; ?></p>
                        <h5><?php echo $testimonio['nombre_cliente']; ?></h5>
                        <p class="text-muted"><?php echo $testimonio['cargo']; ?>, <?php echo $testimonio['empresa']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Contacto -->
    <section id="contacto" class="py-5 bg-dark text-white">
        <div class="container">
            <h2 class="text-center mb-5">Contáctanos</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="5" placeholder="Mensaje"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Enviar Mensaje</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white">
        <div class="container text-center">
            <p>&copy; 2024 Servicios TI LTDA. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 