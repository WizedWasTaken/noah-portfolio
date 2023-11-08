<?php

$dir = './';
$projects = [];

if ($handle = opendir($dir)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && is_dir($dir . '/' . $entry)) {
            
            if (file_exists($dir . '/' . $entry . '/index.html')) {
                $projects[] = [
                    'name' => $entry,
                    'path' => realpath($dir . '/' . $entry), 
                ];
            } else {
                $subDir = $dir . '/' . $entry;
                if ($subHandle = opendir($subDir)) {
                    while (false !== ($subEntry = readdir($subHandle))) {
                        if ($subEntry != "." && $subEntry != ".." && is_dir($subDir . '/' . $subEntry) && file_exists($subDir . '/' . $subEntry . '/index.html')) {
                            $projects[] = [
                                'name' => $subEntry,
                                'path' => realpath($subDir . '/' . $subEntry),
                            ];
                        }
                    }
                    closedir($subHandle);
                }
            }
        }
    }
    closedir($handle);
}

$siteInfoJsonPath = 'siteInfo.json';
$siteInfoData = [];

if (file_exists($siteInfoJsonPath)) {
    $siteInfoJson = file_get_contents($siteInfoJsonPath);
    $siteInfoData = json_decode($siteInfoJson, true);
}

foreach ($projects as &$project) {
    $projectName = $project['name'];
    if (isset($siteInfoData[$projectName]) && isset($siteInfoData[$projectName]['description'])) {
        $project['description'] = $siteInfoData[$projectName]['description'];
    }
}

$responseData = [
    'projects' => $projects,
];

if (!empty($siteInfoData)) {
    $responseData['siteInfo'] = $siteInfoData;
}

echo json_encode($responseData);
?>
