<?php
const EXTFILES_URL = 'https://github.com/Dousselle/Minecraft/tree/6930c81097b274d42ecbaf6d44b8fe9132ae904c/mods';
const EXTFILES_FOLDER = __DIR__ . '/mods';
$json = [
    'extfiles' => []
];
$extfiles = [];
$directory = array_diff(scandir(EXTFILES_FOLDER), ['.', '..']);
foreach ($directory as $file) {
    $extfiles[] = $file;
}
foreach ($extfiles as $extfile) {
    $json['extfiles'][] = [
        'path' => $extfile,
        'downloadURL' => EXTFILES_URL . '/' . $extfile,
        'sha1' => sha1_file(EXTFILES_FOLDER . '/' . $extfile),
        'size' => filesize(EXTFILES_FOLDER . '/' . $extfile)
    ];
}
header('Content-Type: application/json');
echo json_encode($json);
