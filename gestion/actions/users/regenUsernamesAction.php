<?php require_once __DIR__ . '/../../../actions/functions/sessionInit.php'; if (isset($_POST["regenUsernames"])) {
    $selectNames = $db->query('SELECT id, last_name, first_name FROM users');
    $i = 0;

    while ($userInfos = $selectNames->fetch()) {

        $newUsername = username($userInfos['first_name'], $userInfos['last_name']);
        $updateUsername = $db->prepare('UPDATE users SET username = ? WHERE id = ?');
        $updateUsername->execute(array($newUsername, $userInfos['id']));

        $i += 1;
    }

    SaveLog($db, $_SERVER['REQUEST_URI'], 'Username regeneration', 'The username of ' . $i . ' users was regenerated.');

    $msgRegenUsernames = 'The username of ' . $i . ' users was regenerated.';
}
