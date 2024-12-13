<?php include 'partials/header.view.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Estudiantes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <main class="my-12">
        <section class="text-center px-4 md:px-0">
            <h2 class="text-4xl font-extrabold text-gray-800">Gestión de Estudiantes</h2>
            <p class="mt-4 text-xl text-gray-600">Administra la información de los estudiantes aquí</p>
        </section>

        <!-- Formulario para añadir un nuevo estudiante -->
        <section class="mt-8 max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-bold text-gray-700 mb-4">Añadir un nuevo Estudiante</h3>
            <form method="POST" action="/add-student" class="space-y-4">
                <div>
                    <label for="uuid" class="block text-gray-700 font-medium">UUID</label>
                    <input type="text" id="uuid" name="uuid" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                </div>

                <div>
                    <label for="first_name" class="block text-gray-700 font-medium">Nombre</label>
                    <input type="text" id="first_name" name="first_name" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                </div>

                <div>
                    <label for="last_name" class="block text-gray-700 font-medium">Apellido</label>
                    <input type="text" id="last_name" name="last_name" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-medium">Correo Electrónico</label>
                    <input type="email" id="email" name="email" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                </div>

                <div>
                    <label for="password" class="block text-gray-700 font-medium">Contraseña</label>
                    <input type="password" id="password" name="password" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                </div>

                <div>
                    <label for="dni" class="block text-gray-700 font-medium">DNI</label>
                    <input type="text" id="dni" name="dni" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                </div>

                <div>
                    <label for="user_id" class="block text-gray-700 font-medium">ID de Usuario</label>
                    <input type="text" id="user_id" name="user_id" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                </div>

                <div>
                    <label for="enrollment_year" class="block text-gray-700 font-medium">Año de Inscripción</label>
                    <input type="date" id="enrollment_year" name="enrollment_year" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                </div>

                <div>
                    <button type="submit" class="w-full bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-green-700 transition-all">
                        Añadir Estudiante
                    </button>
                </div>
            </form>
        </section>
    </main>

<?php include 'partials/footer.view.php'; ?>

</body>
</html>