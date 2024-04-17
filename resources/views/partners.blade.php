@extends('layouts.app')
@section('content')
    @include('components.secondary-banner', [
        'title' => 'WILLKOMMEN BEI UNSEREN PARTNERSEITEN',
        'image' => '/minimalistic-loft-photo-studio-scaled.jpg',
    ])

    @include('components.partner-c-t-a', [
        'title' => 'WILLKOMMEN BEI UNSEREN PARTNERSEITEN',
        'image' => '/free-spirit.jpg',
        'link' => 'https://www.freespirit.ch/',
        'direction' => 'left',
        'text' => ' <p>
            Als Ausgleich zur Fotografie beschäftige ich mich immer intensiver mit der medialen Welt.
            <br>
            <br>
            Die liebevoll ausgesuchten Produkte in meinem Online-Shop sind wertvolle Werkzeuge, um der eigenen
            Seele
            immer
            näher zu kommen. Lassen Sie sich von Klängen, Düften, Meditationskissen, Yogamatten, Skulpturen und
            vielen
            weiteren schönen Artikeln inspirieren.
            <br>
            <br>
            Mit der Meditation habe ich einen Weg gefunden abzuschalten, innere Ruhe zu erlangen und offen sein
            für
            Neues
            was in meinem Leben auf mich zu kommt. Zur Ruhe kommen ist nicht nur ein wunderschönes Gefühl,
            sondern
            löst
            eine
            unendliche Kraft aus im Äusseren zu bestehen, neues auszuprobieren und neues zu erschaffen.
        </p>',
    ])
    @include('components.partner-c-t-a', [
        'title' => 'DIE BABYS SIND AKTIV DABEI!',
        'image' => '/Logo-Evelyne-Durrer.png',
        'link' => 'https://www.fitdankbaby.ch/',
        'direction' => 'right',
        'text' => ' <p>
            Bei fitdankbaby® ist dein Baby nicht nur dabei! Es wird sinnvoll in alle Übungen einbezogen – mal verstärkt es mit seinem Körpergewicht die Intensität der Übungen, mal motiviert es die Mama mit seinem Lachen. Die Babys lieben die Nähe und die gemeinsame Bewegung und profitieren außerdem von den vielen liebevollen Bewegungsliedern und Spielen, die im Kurs gemacht werden. So können die Mamas Kontakte knüpfen und wie nebenbei etwas für ihren Körper und die Entwicklung ihres Babys tun. Weil es dem Baby Spaß macht, macht es der Mama Spaß und sie bleibt motiviert. Im Kurs geht es erstaunlich ruhig zu, da für die Babys keine Langeweile aufkommt.
            <br>
            <br>
            Haben wir Ihr Interesse geweckt? Buchen Sie bei uns ein Shooting und Sie erhalten 10% auf den Kurs bei Evelyne Durrer.
            </p>',
    ])
    @include('components.partner-c-t-a', [
        'title' => 'RITA BRUN CONSULTING',
        'image' => '/Rita-Brun-Logo.png',
        'link' => 'https://www.ritabrun.ch/',
        'direction' => 'left',
        'text' => '<p>
            Mein Name ist Rita Brun.
            <br><br>
            Ich bin Bewerbungscoach und unterstütze junge Erwachsene auf ihrem Weg in das Berufsleben. Eine professionelle und individuelle Bewerbung und die Vorbereitung auf das Vorstellungsgespräch helfen Jugendlichen sicher  und selbstbewusst aufzutreten.
            <br><br>
            Mein Wunsch als Personalberaterin und Jobcoach tätig zu werden vertiefte sich. Ebenso verstärkte sich mein  Interesse daran, die Menschen in ihren beruflichen Themen zu unterstützen. Mit meiner Berufserfahrung und meinen Weiterbildungen erwarb ich den Fachausweis als eidg. dipl. Personalberaterin. In meiner Laufbahn erweiterte ich fortlaufend mein Fachwissen durch die Teilnahme an internen und externen Kursen.
            </p>',
    ])
@endsection
