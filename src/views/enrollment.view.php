<?php include 'partials/header.view.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Matrículas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <main class="my-12">
        <section class="text-center px-4 md:px-0">
            <h2 class="text-4xl font-extrabold text-gray-800">Gestión de Matrículas</h2>
            <p class="mt-4 text-xl text-gray-600">Administra la información de los matriculas aquí</p>
        </section>

        <section class="mt-8 max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-bold text-gray-700 mb-4">Añadir un nuevo Matriculas</h3>
            <form method="POST" action="/add-enrollment" class="space-y-4">
                <div>
                    <label for="enrollment_date" class="block text-gray-700 font-medium">Fecha de Examen</label>
                    <input type="date" id="enrollment_date" name="enrollment_date" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                </div>

                <div>
                    <label for="student_name" class="block text-gray-700 font-medium">Añadir Matricula a Estudiante</label>
                    <select id="student_name" name="student_name" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                        <?php foreach ($student as $stu): ?>
                            <option value="<?= $stu['id'] ?>"><?= $stu['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="subject_name" class="block text-gray-700 font-medium">Añadir Asignatura a Matricula</label>
                    <select id="subject_name" name="subject_name" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                        <?php foreach ($subject as $sub): ?>
                            <option value="<?= $sub['id'] ?>"><?= $sub['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <button type="submit" class="w-full bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-green-700 transition-all">
                        Añadir Estudiante
                    </button>
                </div>
            </form>
        </section>

        <!-- Listado de Matriculas -->
        <section class="mt-12 max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-bold text-gray-700 mb-4">Listado de Matriculas</h3>
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border-b-2 border-gray-200 p-3 text-left">ID</th>
                        <th class="border-b-2 border-gray-200 p-3 text-left">Fecha de Matrícula</th>
                        <th class="border-b-2 border-gray-200 p-3 text-left">Nombre</th>
                        <th class="border-b-2 border-gray-200 p-3 text-left">Asignatura</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($enrollment)): ?>
                        <?php foreach ($enrollment as $twelve): ?>
                            <tr class="hover:bg-gray-100">
                                <td class="border-b border-gray-200 p-3"><?= $twelve['id'] ?></td>
                                <td class="border-b border-gray-200 p-3"><?= $twelve['enrollment_date'] ?></td>
                                <td class="border-b border-gray-200 p-3"><?= $twelve['student_name'] ?></td>
                                <td class="border-b border-gray-200 p-3"><?= $twelve['subject_name'] ?></td>
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