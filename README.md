# Sistema de ventas e inventario

Proyecto de Programación V. Este repositorio contiene un avance inicial, no la entrega final.
integrantes: Jose Araya, Jose Chacón 
https://github.com/12Araya/ProyectoFinalPrograV
## Incluido en este avance

- Esquema MySQL inicial para usuarios, categorías y productos.
- Conexión PHP mediante PDO.
- Pantalla de inicio de sesión que consulta usuarios activos.
- Inicio de sesión protegido por manejo de sesión.

## Configuración local

1. Copie el contenido del repositorio a una carpeta dentro de `C:\xampp\htdocs`.
2. Inicie Apache y MySQL en XAMPP.
3. Importe `database.sql` desde phpMyAdmin.
4. Revise los datos locales en `conexion/conexion.php`.
5. Abra `http://localhost/<carpeta-del-proyecto>/login.php`.

La creación de la cuenta inicial y el panel posterior al inicio de sesión aún están pendientes. No se incluyen credenciales predeterminadas.

## Pendiente para siguientes avances

- Formulario seguro para crear la cuenta inicial y panel principal.
- CRUD de productos y categorías.
- Ventas, actualización de existencias y reportes.
- Diagrama entidad-relación, capturas y documentación de pruebas.

