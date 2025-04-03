<?php
include 'Etudiant.php';

$etudiants = [
    new Etudiant('Aymen', [11, 13, 18, 7, 10, 13, 2, 5, 1]),
    new Etudiant('Skander', [15, 9, 8, 16]),
    new Etudiant('Mouhamed', [12, 4, 16,4, 12, 14,5, 8, 10])
];
$maxNotes = 0;
foreach ($etudiants as $etudiant) {
    $currentCount = count($etudiant->getNotes());
    if ($currentCount > $maxNotes) {
        $maxNotes = $currentCount;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Notes d'étudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<table class="table table-bordered">
        <thead class="table-white">
            <tr>
                <?php foreach ($etudiants as $etudiant): ?>
                    <th class="text-center"><?= $etudiant->getNom() ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        
        <tbody>
            <?php for ($i = 0; $i < $maxNotes; $i++): ?>
                <tr>
                    <?php foreach ($etudiants as $etudiant): ?>
                        <?php
                        $notes = $etudiant->getNotes();
                        $note = $notes[$i] ?? null;
                        $classe = ($note < 10) ? 'bg-danger' : (($note == 10) ? 'bg-warning' : 'bg-success');
                        ?>
                        <td class="text-center <?= $classe ?>">
                            <?= $note ?? '' ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endfor; ?>
            
            <tr>
                <?php foreach ($etudiants as $etudiant): ?>
                    <td class="text-center">
                        <strong>Moyenne :</strong> <?= number_format($etudiant->calculerMoyenne(), 2) ?><br>
                        <span class="badge bg-primary"><?= $etudiant->estAdmis() ?></span>
                    </td>
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table>
</body>
</html>