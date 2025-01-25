<?php include 'partials/header.view.php';?>

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
            <p class="mt-4 text-xl text-gray-600">Primero crea un estudiante después en matrículas, haz que un estudiante se matricule</p>
            <p class="mt-4 text-xl text-gray-600">Después en el listado de alumnos verás el resultado</p>
        </section>

        <section class="mt-8 max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-bold text-gray-700 mb-4">Añadir un nuevo Estudiante</h3>
            <form method="POST" action="/add-student" class="space-y-4">

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
                    <label for="enrollment_year" class="block text-gray-700 font-medium">Año de Inscripción</label>
                    <input type="date" id="enrollment_year" name="enrollment_year" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                </div>

                <div>
                    <label for="course" class="block text-gray-700 font-medium">Añadir Estudiante a Cursos</label>
                    <select id="course" name="course" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                        <?php foreach ($courses as $course): ?>
                            <option value="<?= $course['id'] ?>"><?= $course['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="degree" class="block text-gray-700 font-medium">Añadir Estudiante a Grado</label>
                    <select id="degree" name="degree" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                        <?php foreach ($degrees as $degree): ?>
                            <option value="<?= $degree['id'] ?>"><?= $degree['name'] ?></option>
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

        <section class="mt-12 max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-bold text-gray-700 mb-4">Listado de Alumnos</h3>
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border-b-2 border-gray-200 p-3 text-left">ID</th>
                        <th class="border-b-2 border-gray-200 p-3 text-left">Nombre</th>
                        <th class="border-b-2 border-gray-200 p-3 text-left">Apellido</th>
                        <th class="border-b-2 border-gray-200 p-3 text-left">Curso</th>
                        <th class="border-b-2 border-gray-200 p-3 text-left">Grado Académico</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($student)): ?>
                        <?php foreach ($student as $third): ?>
                            <tr class="hover:bg-gray-100">
                                <td class="border-b border-gray-200 p-3"><?= $third['student_id']?></td>
                                <td class="border-b border-gray-200 p-3"><?= $third['first_name']?></td>
                                <td class="border-b border-gray-200 p-3"><?= $third['last_name']?></td>
                                <td class="border-b border-gray-200 p-3"><?= $third['course_name']?></td>
                                <td class="border-b border-gray-200 p-3"><?= $third['degree_name']?></td>
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