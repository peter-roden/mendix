<?php
/**
 * @param string $str
 * @deprecated use pll__ and add translations via the backend languages -> strings
 * @return void
 */
function get_translation($str)
{
    $translations = [
        LANGUAGE_CODE_GERMAN => [
			'All' => 'Alles',
			'All rights reserved' => 'Alle Rechte vorbehalten',
            'Contact Us' => 'Kontaktieren Sie uns',
			'Events' => 'Veranstaltungen',
			'Frequently Asked Questions' => 'Häufig gestellte Fragen',
			'Functionality' => 'Funktionalität',
			'Trending' => 'Trend',
			"Privacy Policy" => 'Datenschutzbestimmungen',
			"Terms of Use" => 'Nutzungsbedingungen',
            'Back to press releases' => 'Zurück zu Pressemeldungen',
            'Business Value' => 'Geschäftswert',
            'Click here' => 'Klick hier',
            'Customer Story' => 'Kundenstory',
            'Days' => 'tage',
            'Development Time' => 'Entwicklungszeit',
            'End of posts' => 'Ende des Blogs',
            'Key findings' => 'Wichtigste Ergebnisse',
            'Loading more posts' => 'Weitere Beiträge werden geladen',
            'Media Coverage' => 'Medienberichterstattung',
            'More posts' => 'Weitere Beiträge',
            'Name of application' => 'Name der Applikation',
            'Newer Media coverage' => 'Aktuelle Artikel',
            'Newer press releases' => 'Aktuellere Pressemeldungen',
            'Newsroom' => 'Nachrichtenraum',
            'Newsroom navigation' => 'Nachrichtenraumnavigation',
            'Older Media coverage' => 'Ältere Artikel',
            'Older press releases' => 'Ältere Pressemeldungen',
            'Read more' => 'Mehr erfahren',
            'Recent Releases' => 'Aktuelle Pressemeldungen',
            'Related Assets' => 'Verwandte Artikel',
            'Skip navigation' => 'Navigation überspringen',
            'Subscribe to the blog' => 'Abonnieren Sie den Blog',
            'Topic' => 'Thema',
            'View article' => 'Zum Artikel',
            'Watch the video' => 'Video ansehen',
        ],
		LANGUAGE_CODE_CHINESE => [
			'All rights reserved' => "保留所有权利",
			"Terms of Use" => '使用条款',
			"Privacy Policy" => '隐私政策',
        ],
    ];

    $language = get_current_language();
    $terms = null;

    if (!empty($translations[$language])) {
		$terms = $translations[$language];
		
        if (is_array($terms)) {
            if (!empty($terms[$str])) {
                return $terms[$str];
            }
        }
    }

    return $str;
}
