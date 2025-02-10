<?php

namespace gamepedia\configuration;

use Exception;

class config {
    // Tableau pour stocker les paramètres de configuration
    private static array $settings = [];

    //Initialise la configuration en chargeant le fichier `conf.ini`
    /**
     * @throws Exception
     */
    public static function init(): void {
        // Chemin du fichier de configuration
        $configPath = __DIR__ . '/conf.ini';
        // Vérifie si le fichier existe, sinon exception
        if (!file_exists($configPath)) {
            throw new Exception("Fichier de configuration introuvable : $configPath");
        }
        // Charge depuis le fichier ini
        self::$settings = parse_ini_file($configPath, true);
    }

    public static function get(string $key, string $section = null): mixed {
        // Retourne la valeur de la clé dans une section si précisée
        if ($section) {
            return self::$settings[$section][$key] ?? null;
        }
        // Retourne la valeur globale si aucune section n'est donné
        return self::$settings[$key] ?? null;
    }
}

try {
    // init la config
    config::init();
} catch (Exception $e) {
    echo "Erreur de configuration : " . $e->getMessage();
}
