<?php include 'partials/header.view.php';?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Profesores</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <main class="my-12">
        <section class="text-center px-4 md:px-0">
            <h2 class="text-4xl font-extrabold text-gray-800">Gestión de Profesores</h2>
            <p class="mt-4 text-xl text-gray-600">Administra la información de los profesores aquí y asignalo a un departamento</p>
        </section>

        <section class="mt-8 max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-bold text-gray-700 mb-4">Añadir un nuevo Profesor</h3>
            <form method="POST" action="/add-teacher" class="space-y-4">
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
                    <label for="departamento" class="block text-gray-700 font-medium">Añadir Profesores a Departamento</label>
                    <select id="departamento" name="departamento" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                        <?php foreach ($departments as $department): ?>
                            <option value="<?= $department['id'] ?>"><?= $department['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-blue-700 transition-all mt-5">
                        Añadir Profesor
                    </button>
                </div>
            </form>
        </section>

        <section class="mt-12 max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-bold text-gray-700 mb-4">Listado de Profesores</h3>
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border-b-2 border-gray-200 p-3 text-left">ID</th>
                        <th class="border-b-2 border-gray-200 p-3 text-left">Nombre</th>
                        <th class="border-b-2 border-gray-200 p-3 text-left">Apellido</th>
                        <th class="border-b-2 border-gray-200 p-3 text-left">Departamento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($teacher)): ?>
                        <?php foreach ($teacher as $first): ?>
                            <tr class="hover:bg-gray-100">
                                <td class="border-b border-gray-200 p-3"><?= $first['id'] ?></td>
                                <td class="border-b border-gray-200 p-3"><?= $first['first_name'] ?></td>
                                <td class="border-b border-gray-200 p-3"><?= $first['last_name'] ?></td>
                                <td class="border-b border-gray-200 p-3"><?= $first['department_name'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>

</body>
</html>
