/**
 * Obsługa przełączania motywu (Jasny / Ciemny)
 * Zapis w localStorage, obsługa preferencji systemowych oraz aktualizacja UI.
 */
(function () {
    'use strict';

    const STORAGE_KEY = 'theme';
    const THEME_DARK = 'dark';
    const THEME_LIGHT = 'light';

    /**
     * Zwraca motyw preferowany przez system operacyjny
     */
    function getSystemTheme() {
        return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            ? THEME_DARK
            : THEME_LIGHT;
    }

    /**
     * Zwraca motyw zapisany w localStorage (jeśli jest poprawny)
     */
    function getStoredTheme() {
        try {
            const saved = localStorage.getItem(STORAGE_KEY);
            return saved === THEME_DARK || saved === THEME_LIGHT ? saved : null;
        } catch (e) {
            return null;
        }
    }

    /**
     * Zapisuje motyw w localStorage
     */
    function storeTheme(theme) {
        try {
            localStorage.setItem(STORAGE_KEY, theme);
        } catch (e) {
            // Ignorujemy błędy w trybie prywatnym / przy zablokowanym storage
        }
    }

    /**
     * Aktualizuje wygląd wszystkich przycisków .theme-toggle na stronie
     */
    function updateToggleButtons(theme) {
        const isDark = theme === THEME_DARK;
        // W trybie ciemnym proponujemy przejście na słońce/jasny, w jasnym na księżyc/ciemny
        const iconChar = isDark ? '☀️' : '🌙';
        const labelText = isDark ? 'Jasny' : 'Ciemny';
        const ariaLabel = isDark ? 'Przełącz na jasny motyw' : 'Przełącz na ciemny motyw';

        const buttons = document.querySelectorAll('.theme-toggle');
        buttons.forEach(function (button) {
            button.setAttribute('aria-label', ariaLabel);
            button.setAttribute('title', ariaLabel);

            const iconEl = button.querySelector('.theme-toggle-icon');
            if (iconEl) {
                iconEl.textContent = iconChar;
            }

            const labelEl = button.querySelector('.theme-toggle-label');
            if (labelEl) {
                labelEl.textContent = labelText;
            }
        });
    }

    /**
     * Aplikuje wybrany motyw na elemencie <html>
     */
    function applyTheme(theme, save) {
        const targetTheme = (theme === THEME_DARK || theme === THEME_LIGHT) ? theme : THEME_LIGHT;
        document.documentElement.setAttribute('data-theme', targetTheme);

        if (save) {
            storeTheme(targetTheme);
        }

        updateToggleButtons(targetTheme);
    }

    /**
     * Przełącza motyw na przeciwny
     */
    function toggleTheme() {
        const currentTheme = document.documentElement.getAttribute('data-theme') || getStoredTheme() || getSystemTheme();
        const nextTheme = currentTheme === THEME_DARK ? THEME_LIGHT : THEME_DARK;
        applyTheme(nextTheme, true);
    }

    /**
     * Inicjalizacja skryptu
     */
    function initTheme() {
        const initialTheme = document.documentElement.getAttribute('data-theme')
            || getStoredTheme()
            || getSystemTheme();

        applyTheme(initialTheme, false);

        // Delegacja obsługi kliknięcia w przycisk zmiany motywu
        document.addEventListener('click', function (event) {
            const toggleBtn = event.target.closest('.theme-toggle');
            if (toggleBtn) {
                event.preventDefault();
                toggleTheme();
            }
        });

        // Nasłuchiwanie na zmiany preferencji systemowych (gdy brak zapisanego wyboru)
        if (window.matchMedia) {
            const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
            const handleChange = function (e) {
                if (!getStoredTheme()) {
                    applyTheme(e.matches ? THEME_DARK : THEME_LIGHT, false);
                }
            };

            if (mediaQuery.addEventListener) {
                mediaQuery.addEventListener('change', handleChange);
            } else if (mediaQuery.addListener) {
                mediaQuery.addListener(handleChange);
            }
        }
    }

    // Uruchomienie po załadowaniu drzewa DOM
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initTheme);
    } else {
        initTheme();
    }
})();
