<?php
class SearchModel {
    private $pdo;

    private $paths = [
        'course' => [
            1  => '/tektn/view/pages/courses/development/cours/html/html.php',
            2  => '/tektn/view/pages/courses/development/cours/css/css.php',
            3  => '/tektn/view/pages/courses/development/cours/javascript/js.php',
            4  => '/tektn/view/pages/courses/development/cours/python/python.php',
            5  => '/tektn/view/pages/courses/development/cours/java/java.php',
            6  => '/tektn/view/pages/courses/development/cours/c++/c++.php',
            7  => '/tektn/view/pages/courses/development/cours/php/php.php',
            8  => '/tektn/view/pages/courses/marketing/cours/analyse/analyse.php',
            9  => '/tektn/view/pages/courses/marketing/cours/brand/brand.php',
            10 => '/tektn/view/pages/courses/marketing/cours/digital/digital.php',
            11 => '/tektn/view/pages/courses/marketing/cours/performance/performance.php',
            12 => '/tektn/view/pages/courses/science/cours/svt/svt.php',
            13 => '/tektn/view/pages/courses/science/cours/physique/phy.php',
            14 => '/tektn/view/pages/courses/science/cours/chimie/chimie.php',
            15 => '/tektn/view/pages/courses/science/cours/math/math.php',
            16 => '/tektn/view/pages/courses/design/cours/adobe/adobe.php',
            17 => '/tektn/view/pages/courses/design/cours/colors/colors.php',
            18 => '/tektn/view/pages/courses/design/cours/figma/figma.php',
            19 => '/tektn/view/pages/courses/design/cours/sketch/sketch.php',
            20 => '/tektn/view/pages/courses/languages/cours/arabic/arabic.php',
            21 => '/tektn/view/pages/courses/languages/cours/english/english.php',
            22 => '/tektn/view/pages/courses/languages/cours/french/french.php',
            23 => '/tektn/view/pages/courses/languages/cours/spanish/spanish.php',
            24 => '/tektn/view/pages/courses/islamic/course/quran/quran.php',
            25 => '/tektn/view/pages/courses/islamic/course/prayer/prayer.php',
            26 => '/tektn/view/pages/courses/islamic/course/calender/calender.php',
        ],
        'topic' => [
            1  => '/tektn/view/pages/courses/development/dev.php',
            2  => '/tektn/view/pages/courses/islamic/islamic.php',
            3  => '/tektn/view/pages/courses/languages/languages.php',
            4  => '/tektn/view/pages/courses/design/design.php',
            5  => '/tektn/view/pages/courses/science/science.php',
            6  => '/tektn/view/pages/courses/marketing/marketing.php',       
        ]
    ];

    public function __construct() {
        global $cnx;
        require_once __DIR__ . '/../config/database.php';
        $this->pdo = $cnx;
    }

    public function search(string $query): array {
        $searchTerm = "%{$query}%";
        $results = [];

        $stmt = $this->pdo->prepare(
            "SELECT course_id AS id, course_name AS name, 'course' AS type
             FROM courses
             WHERE course_name LIKE ?"
        );
        $stmt->execute([$searchTerm]);
        $results = array_merge($results, $stmt->fetchAll(PDO::FETCH_ASSOC));

        $stmt = $this->pdo->prepare(
            "SELECT topic_id AS id, name, 'topic' AS type
             FROM topics
             WHERE name LIKE ?"
        );
        $stmt->execute([$searchTerm]);
        $results = array_merge($results, $stmt->fetchAll(PDO::FETCH_ASSOC));

        foreach ($results as &$result) {
            $type = $result['type'];
            $id   = $result['id'];
            $result['url'] = $this->paths[$type][$id] ?? '';
        }

        return $results;
    }
}
?>