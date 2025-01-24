<?php include 'partials/header.view.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Grados Formativos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <main class="my-12">
        <section class="text-center px-4 md:px-0">
            <h2 class="text-4xl font-extrabold text-gray-800">Gestión de Grados Formativos</h2>
            <p class="mt-4 text-xl text-gray-600">Administra la información de los Grados aquí</p>
        </section>

        <section class="mt-8 max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-bold text-gray-700 mb-4">Añadir un nuevo Grado</h3>
            <form method="POST" action="/add-degree" class="space-y-4">
                <div>
                    <label for="name" class="block text-gray-700 font-medium">Nombre</label>
                    <input type="text" id="name" name="name" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                </div>
                <div>
                    <label for="duration_years" class="block text-gray-700 font-medium">Años de Duración</label>
                    <input type="text" id="duration_years" name="duration_years" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-blue-700 transition-all">
                        Añadir Grado Académico
                    </button>
                </div>
            </form>
        </section>

        <section class="mt-12 max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-bold text-gray-700 mb-4">Listado de Grados Académicos</h3>
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border-b-2 border-gray-200 p-3 text-left">ID</th>
                        <th class="border-b-2 border-gray-200 p-3 text-left">Nombre</th>
                        <th class="border-b-2 border-gray-200 p-3 text-left">Años de Duración</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($degree)): ?>
                        <?php foreach ($degree as $fourth): ?>
                            <tr class="hover:bg-gray-100">
                                <td class="border-b border-gray-200 p-3"><?= $fourth['id'] ?></td>
                                <td class="border-b border-gray-200 p-3"><?= $fourth['name'] ?></td>
                                <td class="border-b border-gray-200 p-3"><?= $fourth['duration_years'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>

<?php include 'partials/footer.view.php'; ?>

</body>
</html>