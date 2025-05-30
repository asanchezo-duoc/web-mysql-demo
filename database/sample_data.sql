USE servicios_ti_db;

-- Insertar servicios
INSERT INTO servicios (nombre, descripcion, icono) VALUES
('Desarrollo Web', 'Creamos sitios web modernos y responsivos utilizando las últimas tecnologías.', 'fas fa-code'),
('Consultoría IT', 'Asesoramiento especializado en transformación digital y optimización de procesos.', 'fas fa-laptop-code'),
('Ciberseguridad', 'Protección integral de sus sistemas y datos contra amenazas cibernéticas.', 'fas fa-shield-alt'),
('Cloud Computing', 'Soluciones en la nube para optimizar sus recursos y mejorar la escalabilidad.', 'fas fa-cloud');

-- Insertar testimonios
INSERT INTO testimonios (nombre_cliente, cargo, empresa, testimonio, imagen) VALUES
('María González', 'CEO', 'TechCorp', 'Servicios TI LTDA transformó completamente nuestra infraestructura digital.', 'cliente1.jpg'),
('Juan Pérez', 'CTO', 'Innovatech', 'Excelente servicio y soporte técnico de primer nivel.', 'cliente2.jpg'),
('Ana Martínez', 'Directora de IT', 'GlobalSoft', 'Su equipo de consultoría nos ayudó a optimizar nuestros procesos.', 'cliente3.jpg');

-- Insertar equipo
INSERT INTO equipo (nombre, cargo, descripcion, imagen) VALUES
('Carlos Rodríguez', 'CEO', 'Más de 15 años de experiencia en el sector tecnológico.', 'equipo1.jpg'),
('Laura Sánchez', 'CTO', 'Especialista en arquitectura de software y cloud computing.', 'equipo2.jpg'),
('Miguel Torres', 'Director de Seguridad', 'Experto en ciberseguridad y protección de datos.', 'equipo3.jpg'); 