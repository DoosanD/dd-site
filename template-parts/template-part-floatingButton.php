<?php
/**
 * Floating Button template part
 *
 * @package D_Theme
 */
?>

<?php if (is_singular('post')): ?>
    <div id="accessibility-toolbar">

        <!-- Main toggle -->
        <input type="checkbox" id="accessibility-toggle" class="accessibility-toggle">
        <label for="accessibility-toggle" class="accessibility-button" aria-label="Accessibility Options">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
            </svg>
        </label>

        <div class="accessibility-panel">
            <h3>
                <?php
                echo (pll_current_language() === 'en') ? 'Accessibility Options' : 'Опције приступачности';
                ?>
            </h3>

            <!-- Font Size Controls -->
            <div class="accessibility-option">
                <p class="option-label">
                    <?php
                    echo (pll_current_language() === 'en') ? 'Text Size' : 'Величина текста';
                    ?>
                </p>
                <div class="font-size-controls">

                    <input type="radio" name="font-size" id="font-normal" value="normal" checked>
                    <label for="font-normal">
                        <?php
                        echo (pll_current_language() === 'en') ? 'Normal' : 'Нормално';
                        ?>
                    </label>

                    <input type="radio" name="font-size" id="font-larger" value="larger">
                    <label for="font-larger">+</label>

                    <input type="radio" name="font-size" id="font-largest" value="largest">
                    <label for="font-largest">++</label>

                </div>
            </div>

            <!-- High Contrast Mode -->
            <div class="accessibility-option">
                <input type="checkbox" id="high-contrast" class="toggle-checkbox">
                <label for="high-contrast" class="toggle-label">
                    <?php echo (pll_current_language() === 'en') ? 'High Contrast Mode' : 'Режим високог контраста'; ?>
                </label>
            </div>

            <!-- Reading Mode -->
            <div class="accessibility-option">
                <input type="checkbox" id="reading-mode" class="toggle-checkbox">
                <label for="reading-mode" class="toggle-label">
                    <?php echo (pll_current_language() === 'en') ? 'Reading Mode' : 'Режим Читања'; ?>
            </div>

            <!-- Hide Toolbar -->
            <div class="accessibility-option">
                <input type="checkbox" id="hide-toolbar" class="toggle-checkbox">
                <label for="hide-toolbar" class="toggle-label">
                    <?php
                    echo (pll_current_language() === 'en') ? 'Hide Accessibility Button' : 'Сакриј дугме';
                    ?>
                </label>
            </div>
        </div>
    </div>
<?php endif; ?>