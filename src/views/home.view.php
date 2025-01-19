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

    <main class="py-16">
        <section class="container mx-auto px-6 md:px-12 text-center">
            <h1 class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-green-500 mb-8">
                Bienvenido a la Gestión Escolar
            </h1>
            <p class="text-lg text-gray-700 mb-12">
                Explora nuestras opciones para administrar profesores, estudiantes, departamentos y cursos con facilidad.
            </p>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <a href="/teachers" class="group bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-blue-500 text-white rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 2a6 6 0 100 12A6 6 0 0010 2zm-8 12a8 8 0 1116 0H2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Profesores</h3>
                        <p class="text-gray-600 mt-2">Añade y gestiona la información de tus profesores.</p>
                        <span class="mt-4 text-blue-500 font-semibold group-hover:underline">Ver más</span>
                    </div>
                </a>

                <a href="/students" class="group bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-green-500 text-white rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a7 7 0 100 14 7 7 0 000-14zM2 10a8 8 0 1116 0H2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Estudiantes</h3>
                        <p class="text-gray-600 mt-2">Añade y gestiona la información de tus alumnos.</p>
                        <span class="mt-4 text-green-500 font-semibold group-hover:underline">Ver más</span>
                    </div>
                </a>

                <a href="/departments" class="group bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-yellow-500 text-white rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 7H7v6h6V7z" />
                                <path fill-rule="evenodd" d="M2 10a8 8 0 1116 0A8 8 0 012 10z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Departamentos</h3>
                        <p class="text-gray-600 mt-2">Administra los departamentos de tu institución.</p>
                        <span class="mt-4 text-yellow-500 font-semibold group-hover:underline">Ver más</span>
                    </div>
                </a>

                <a href="/courses" class="group bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-red-500 text-white rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 7H7v6h6V7z" />
                                <path fill-rule="evenodd" d="M2 10a8 8 0 1116 0A8 8 0 012 10z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Cursos</h3>
                        <p class="text-gray-600 mt-2">Gestiona los cursos disponibles para los estudiantes.</p>
                        <span class="mt-4 text-red-500 font-semibold group-hover:underline">Ver más</span>
                    </div>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mt-8">
                <a href="/degrees" class="group bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-purple-500 text-white rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 7H7v6h6V7z" />
                                <path fill-rule="evenodd" d="M2 10a8 8 0 1116 0A8 8 0 012 10z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Grado</h3>
                        <p class="text-gray-600 mt-2">Gestiona los grados disponibles para los estudiantes.</p>
                        <span class="mt-4 text-purple-500 font-semibold group-hover:underline">Ver más</span>
                    </div>
                </a>

                <a href="/exams" class="group bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-indigo-500 text-white rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 7H7v6h6V7z" />
                                <path fill-rule="evenodd" d="M2 10a8 8 0 1116 0A8 8 0 012 10z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Exámenes</h3>
                        <p class="text-gray-600 mt-2">Gestiona los exámenes y sus detalles.</p>
                        <span class="mt-4 text-indigo-500 font-semibold group-hover:underline">Ver más</span>
                    </div>
                </a>

                <a href="/subjects" class="group bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-teal-500 text-white rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 7H7v6h6V7z" />
                                <path fill-rule="evenodd" d="M2 10a8 8 0 1116 0A8 8 0 012 10z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Asignaturas</h3>
                        <p class="text-gray-600 mt-2">Gestiona las asignaturas ofrecidas por la institución.</p>
                        <span class="mt-4 text-teal-500 font-semibold group-hover:underline">Ver más</span>
                    </div>
                </a>

                <a href="/enrollments" class="group bg-white shadow-xl rounded-lg p-6 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-pink-500 text-white rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 7H7v6h6V7z" />
                                <path fill-rule="evenodd" d="M2 10a8 8 0 1116 0A8 8 0 012 10z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Matrículas</h3>
                        <p class="text-gray-600 mt-2">Gestiona las matrículas de tus estudiantes.</p>
                        <span class="mt-4 text-pink-500 font-semibold group-hover:underline">Ver más</span>
                    </div>
                </a>
            </div>
        </section>
    </main>

<?php include 'partials/footer.view.php'; ?>

</body>
</html>
