<?php include 'partials/header.view.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Examenes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <main class="my-12">
        <section class="text-center px-4 md:px-0">
            <h2 class="text-4xl font-extrabold text-gray-800">Gestión de Exámenes</h2>
            <p class="mt-4 text-xl text-gray-600">Administra la información de los exámenes aquí y asigna un examen a una asignatura</p>
        </section>

        <section class="mt-8 max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-bold text-gray-700 mb-4">Añadir un Nuevo Examen</h3>
            <form method="POST" action="/add-exam" class="space-y-4">
                <div>
                    <label for="exam_date" class="block text-gray-700 font-medium">Fecha de Examen</label>
                    <input type="date" id="exam_date" name="exam_date" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                </div>
                <div>
                    <label for="description" class="block text-gray-700 font-medium">Descripción</label>
                    <input type="text" id="description" name="description" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                </div>
                <div>
                    <label for="subject_name" class="block text-gray-700 font-medium">Asignatura del examen</label>
                    <select id="subject_name" name="subject_name" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                        <?php foreach ($subject as $sub): ?>
                            <option value="<?= $sub['id'] ?>"><?= $sub['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-blue-700 transition-all">
                        Añadir Examen
                    </button>
                </div>
            </form>
        </section>

        <!-- Listado de Examenes -->
        <section class="mt-12 max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-bold text-gray-700 mb-4">Listado de Examenes</h3>
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border-b-2 border-gray-200 p-3 text-left">ID</th>
                        <th class="border-b-2 border-gray-200 p-3 text-left">Fecha de Examen</th>
                        <th class="border-b-2 border-gray-200 p-3 text-left">Asignatura</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($exam)): ?>
                        <?php foreach ($exam as $eleven): ?>
                            <tr class="hover:bg-gray-100">
                                <td class="border-b border-gray-200 p-3"><?= $eleven['id'] ?></td>
                                <td class="border-b border-gray-200 p-3"><?= $eleven['exam_date'] ?></td>
                                <td class="border-b border-gray-200 p-3"><?= $eleven['subject_name'] ?></td>
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