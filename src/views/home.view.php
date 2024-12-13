<?php include 'partials/header.view.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Escolar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <main class="my-12">
        <section class="text-center px-4 md:px-0">
            <h2 class="text-4xl font-extrabold text-gray-800">Bienvenido a la Gestión Escolar</h2>
            <p class="mt-4 text-xl text-gray-600">Donde la educación y la administración se encuentran</p>
            <div class="mt-8">
                <a href="/teachers"
                   class="inline-block bg-blue-600 text-white text-lg font-semibold py-3 px-8 rounded-lg shadow-lg hover:bg-blue-700 transition-all">Añadir un nuevo Profesor</a>
            </div>
            <div class="mt-8">
                <a href="/students"
                   class="inline-block bg-green-600 text-white text-lg font-semibold py-3 px-8 rounded-lg shadow-lg hover:bg-blue-700 transition-all">Añadir un nuevo Alumno</a>
            </div>
        </section>
    </main>

<?php include 'partials/footer.view.php'; ?>

</body>
</html>
