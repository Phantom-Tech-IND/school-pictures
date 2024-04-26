<?php

namespace App\Constants;

class Constants
{
    const FACEBOOK_URL = 'https://www.facebook.com/pages/ArtLine-Fotografie-AG/105849706102568';
    const INSTAGRAM_URL = 'https://www.instagram.com/artline.fotografie.ag/';
    const KINDERGARDEN_IMAGE_URL = '/content/kindergarden-and-school/';
    const KINDERGARDEN_ALT_TEXT = 'ArtLine Fotografie AG';
    const CHECKBOX_LABELS = [
        'Bewerbungen',
        'Portrait, Familie u. Friends',
        'Halb,-Akt u. Babybauch',
        'Gebäudeaufnahmen und Architektu',
        'Kalendershooting',
        'Lichtshooting',
        'Kinder & Schule',
        'Portraitbilder für Firmen',
        'Rainshooting',
        'Lehrlingsshooting',
        'Hochzeitsfotografie',
        'Gruppenbilder für Firmen',
    ];

    const TEAM_MEMBERS = [
        [
            'name' => 'Tanja Arnold',
            'role' => 'Geschäftsinhaberin',
            'image' => 'Tanja-Arnold-1.jpg',
            'facebook_url' => '#',
            'instagram_url' => '#',
        ],
        [
            'name' => 'Petra Mettler',
            'role' => 'Printmedienverarbeiterin EFZ',
            'image' => '/Petra-Mettler.jpg',
            'facebook_url' => '#',
            'instagram_url' => '#',

        ],
        [
            'name' => 'Martina Aregger',
            'role' => 'Stv. Geschäftsführung / Fotofachfrau EFZ',
            'image' => '/Martina-Aregger-Neu.jpg',
            'facebook_url' => '#',
            'instagram_url' => '#',

        ],
    ];

    const FAQ_TABS = [
        [
            'id' => 'kindergarten-und-schulfotografie',
            'name' => 'KINDERGARTEN- UND SCHULFOTOGRAFIE',
            'questions' => [
                [
                    'title' => 'Warum sind die Preise für die Bilder so hoch?',
                    'answer' => 'Wir fotografieren in den Kindergärten und Schulen auf unser Risiko.
                    Hinter der Bilder steckt sehr viel Arbeit und dies ist auch mit kosten verbunden.',
                ],
                [
                    'title' => 'Mein Kind war an diesem Tag nicht in der Schule. Kann ich trotzdem etwas bestellen?',
                    'answer' => 'Ja, das können Sie.
                    Wenn Sie von der Lehrperson keine Codekarte erhalten haben, dürfen Sie sich per Kontaktformular bei uns melden.',
                ],
                [
                    'title' => 'Das Login funktioniert nicht. Wie kann ich die Bilder trotzdem anschauen?',
                    'answer' => 'Wenn das Login nicht funktioniert, kann dies verschiedene Gründe haben.
                    Damit wir Ihnen helfen können, kontaktieren Sie uns am besten telefonisch unter 041 921 40 25.',
                ],
            ],
        ],
        [
            'id' => 'pass-/bewerbungsbilder',
            'name' => 'PASS-/BEWERBUNGSBILDER',
            'questions' => [
                [
                    'title' => 'Brauche ich einen Termin?',
                    'answer' => 'Es ist besser einen Termin zu vereinbaren.
                    So knnen Sie sichergehen, dass wir nicht bereits besetzt sind.
                    Wenn Sie spontan vorbeikommen, kann es sein, dass Sie warten mssen oder an einem anderen Tag vorbeikommen mssen.',
                ],
                [
                    'title' => 'Wie schnell erhalte ich meine Bilder?',
                    'answer' => 'In der Regel erhalten Sie Ihre Bilder am selben Tag.
                    Bei Bewerbungsbilder behalten wir uns das recht vor, die Bilder erst am nächsten Tag zu bearbeiten.',
                ],
                [
                    'title' => 'Was kostet ein Pass-/Bewerbungsbild?',
                    'answer' => 'Unsere Angebote für Bewerbungsbilder finden Sie hier: https://artlinefotografie.ch/business-und-bewerbungsbilder/
                    Und das Angebot für Passbilder hier: https://artlinefotografie.ch/passbilder/',
                ],
                [
                    'title' => 'Was kostet ein Pass-/Bewerbungsbild?',
                    'answer' => 'Unsere Angebote für Bewerbungsbilder finden Sie hier: https://artlinefotografie.ch/business-und-bewerbungsbilder/
                    Und das Angebot für Passbilder hier: https://artlinefotografie.ch/passbilder/',
                ],
                [
                    'title' => 'Welche Kleidung soll ich anziehen?',
                    'answer' => 'Das wichtigste ist, dass Sie sich wohl fühlen. Es soll für Sie kein “verkleiden” sein.
                    Am besten sind schlichte Farben. Sehr bunte Kleidung lenkt sehr vom Gesicht ab.
                    Ebenso sollte die Kleidung nicht zu gemustert sein.
                    Die Schultern sollten gedeckten sein und der Ausschnitt nicht zu tief.
                    So macht Ihr Bewerbungsbild einen guten ersten Eindruck.',
                ],
            ],
        ],
        [
            'id' => 'bestellungen',
            'name' => 'BESTELLUNGEN',
            'questions' => [
                [
                    'title' => 'Wie lange dauert die Lieferung?',
                    'answer' => 'Die Lieferung dauert in der Regel ca. 1 Woche.
                    In der Hochsaison (April, Mai, Juni, September, Oktober, November, Dezember) kann dies, aufgrund der vielen Bestellungen bis zu 3 Wochen dauern.
                    Wenn Sie die Bilder bis zu einem bestimmten Zeitpunkt brauchen, empfehlen wir Ihnen früh genug zu bestellen.',
                ],
                [
                    'title' => 'Warum brauchen Sie für die Bestellungen so lange?',
                    'answer' => 'Wir sind ein kleineres Team. Da wir alles selber machen, über das Fotografieren bis hin zum verpacken und versenden der Bestellung, kann dies teilweise etwas länger dauern.',
                ],
                [
                    'title' => 'Meine Bestellung ist nicht angekommen. Was muss ich tun?',
                    'answer' => 'Wenn Ihre Bestellung nach 3 Wochen nicht bei Ihnen eingetroffen ist, bitten wir Sie sich bei uns telefonisch oder über das Kontaktformular zu melden.
                    So können wir gemeinsam schauen, wo der Hacken ist.',
                ],
                [
                    'title' => 'Kann ich auch mit einer Rechnung bezahlen?',
                    'answer' => 'Rechnung bieten wir nicht an. Es gibt die Möglichkeit mit Kreditkarte, Twint, Paypal oder mit Vorkasse zu bezahlen.',
                ],
                [
                    'title' => 'Wie erhalte ich die digitalen Daten?',
                    'answer' => 'Die digitalen Daten erhalten Sie per Mail.
                    Diese versenden wir an die angegeben E-Mail Adresse, welche Sie bei der Bestellung angegeben haben.
                    Wenn der Downloadlink nicht mehr gültig ist, dürfen Sie sich bei uns melden und wir senden Ihnen einen neuen Link.',
                ],
                [
                    'title' => 'Meine Bestellung wurde beschädigt geliefert. Wie muss ich vorgehen?',
                    'answer' => 'Wir möchten uns entschuldigen, dass die Bestellung bei der Lieferung beschädigt wurde.
                    Damit wir Ihnen einen Ersatz anbieten können, benötigen wir Fotos der Beschädigung.
                    Diese dürfen Sie uns gerne per Mail zustellen.',
                ],
            ],
        ],
    ];
}
