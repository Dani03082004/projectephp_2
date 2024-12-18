<?php include 'partials/header.view.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Escolar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

    <main class="my-12">
        <section class="container mx-auto px-6 md:px-12 text-center">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-6">Bienvenido a la Gestión Escolar</h2>
            <p class="text-lg text-gray-600 mb-12">Explora las opciones para gestionar profesores, estudiantes, departamentos y cursos con facilidad.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <a href="/teachers" class="group bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 2a6 6 0 100 12A6 6 0 0010 2zm-8 12a8 8 0 1116 0H2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Profesores</h3>
                        <p class="text-gray-600 mt-2">Añade y gestiona la información de tus profesores.</p>
                        <span class="mt-4 text-blue-600 font-semibold group-hover:underline">Ver más</span>
                    </div>
                </a>

                <a href="/students" class="group bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a7 7 0 100 14 7 7 0 000-14zM2 10a8 8 0 1116 0H2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Estudiantes</h3>
                        <p class="text-gray-600 mt-2">Añade y gestiona la información de tus alumnos.</p>
                        <span class="mt-4 text-green-600 font-semibold group-hover:underline">Ver más</span>
                    </div>
                </a>

                <a href="/departments" class="group bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 7H7v6h6V7z" />
                                <path fill-rule="evenodd" d="M2 10a8 8 0 1116 0A8 8 0 012 10z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Departamentos</h3>
                        <p class="text-gray-600 mt-2">Administra los departamentos de tu institución.</p>
                        <span class="mt-4 text-yellow-600 font-semibold group-hover:underline">Ver más</span>
                    </div>
                </a>

                <a href="/courses" class="group bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 7H7v6h6V7z" />
                                <path fill-rule="evenodd" d="M2 10a8 8 0 1116 0A8 8 0 012 10z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Cursos</h3>
                        <p class="text-gray-600 mt-2">Gestiona los cursos disponibles para los estudiantes.</p>
                        <span class="mt-4 text-red-600 font-semibold group-hover:underline">Ver más</span>
                    </div>
                </a>
            </div>
        </section>
    </main>

<?php include 'partials/footer.view.php'; ?>

</body>
</html>
