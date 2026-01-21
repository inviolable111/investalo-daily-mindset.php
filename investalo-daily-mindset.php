<?php
/**
 * Plugin Name: Investalo Daily Mindset
 * Description: Zeigt täglich wechselnde Trading-Psychologie-Sprüche in einem eleganten Türkis-Design.
 * Version: 1.0
 * Author: Chris | Investalo Akademie
 */

if (!defined('ABSPATH')) exit;

/**
 * Shortcode: [daily_mindset]
 */
function investalo_daily_mindset_shortcode() {
    $quotes = [
        "Disziplin ist dein größter Hebel.",
        "Klar denken. Ruhig handeln.",
        "Der Markt testet – du entscheidest.",
        "Geduld ist Kontrolle, nicht Warten.",
        "Heute sauber. Morgen konstant.",
        "Weniger Trades. Mehr Qualität.",
        "Regeln zuerst. Gefühle später.",
        "Kapital schützen ist Fortschritt.",
        "Stabilität schlägt Geschwindigkeit.",
        "Fokus ist deine stille Stärke."
    ];

    // Automatischer Tageswechsel basierend auf dem Tag des Jahres
    $day_index = date('z') % count($quotes);
    $quote = esc_html($quotes[$day_index]);

    ob_start(); ?>
    <div class="mindset-robot-card">
        <p class="mindset-robot-text">“<?php echo $quote; ?>”</p>
    </div>
    <?php return ob_get_clean();
}
add_shortcode('daily_mindset', 'investalo_daily_mindset_shortcode');

/** Styles in den Head laden */
add_action('wp_head', function() {
    ?>
    <style>
    .mindset-robot-card {
        max-width: 460px;
        margin: 40px auto;
        padding: 34px 32px;
        border-radius: 30px;
        background: linear-gradient(160deg, #ecfffd, #ffffff);
        border: 1px solid rgba(120,220,210,0.45);
        text-align: center;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(120,220,210,0.35);
        animation: softGlow 6s ease-in-out infinite;
    }
    .mindset-robot-text {
        font-size: 25px;
        font-weight: 500;
        line-height: 1.45;
        color: #3bbfb3;
        letter-spacing: 0.4px;
        margin: 0;
        text-shadow: 0 0 10px rgba(120,220,210,0.35);
    }
    @keyframes softGlow {
        0%   { box-shadow: 0 6px 26px rgba(120,220,210,0.28); }
        50%  { box-shadow: 0 10px 34px rgba(120,220,210,0.42); }
        100% { box-shadow: 0 6px 26px rgba(120,220,210,0.28); }
    }
    @media (max-width: 600px) {
        .mindset-robot-text { font-size: 22px; }
    }
    </style>
    <?php
});
