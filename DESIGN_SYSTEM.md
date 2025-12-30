# Moonstar School - Design System & UI Kit

## 1. Brand Identity
**Tagline:** "Illuminating Young Minds."
**Tone:** Premium, Professional, Trustworthy, Emotional, Warm.
**Target Audience:** Parents seeking high-quality international standard education.

## 2. Color Palette
We use a sophisticated palette to move away from primary "kiddy" colors.

| Role | Color Name | Hex Code | Tailwind Class (Approx) | Usage |
|------|------------|----------|-------------------------|-------|
| **Primary** | Midnight Indigo | `#1e1b4b` | `bg-indigo-950` | Headers, Primary Buttons, Footer |
| **Secondary** | Celestial Blue | `#3b82f6` | `text-blue-500` | Links, Highlights, sub-headers |
| **Accent** | Moon Gold | `#fbbf24` | `text-amber-400` | CTAs, Icons, Trust Indicators |
| **Background** | Starlight White | `#f8fafc` | `bg-slate-50` | Main Page Backgrounds |
| **Surface** | Pure White | `#ffffff` | `bg-white` | Cards, Panels |
| **Text (Body)** | Deep Slate | `#334155` | `text-slate-700` | Body Text |
| **Text (Head)** | Obsidian | `#0f172a` | `text-slate-900` | Headings |

## 3. Typography
We use a dual-font stack for a modern, distinct look.

*   **Headings:** `Plus Jakarta Sans` or `Poppins`. Font-weight: 700/800.
    *   *Usage:* Hero titles, Section headers, Card titles.
*   **Body:** `Inter`. Font-weight: 400/500.
    *   *Usage:* Paragraphs, lists, UI elements.

## 4. UI Elements & Components

### Buttons
*   **Primary Button:**
    *   Background: Midnight Indigo Gradient (to slightly lighter indigo).
    *   Text: White.
    *   Shape: 50px rounded (Pill shape) or 12px rounded.
    *   Effect: Shadow-lg, Hover: Scale 1.05.
*   **Secondary Button (Outline):**
    *   Border: 2px Solid Indigo.
    *   Text: Indigo.
    *   Hover: Fill Indigo, Text White.

### Cards (Glassmorphism where appropriate)
*   **Standard Card:** White background, `rounded-2xl`, `shadow-md`, `hover:shadow-xl`, `transition-all`.
*   **Glass Card:** `bg-white/80`, `backdrop-blur-md`, `border-white/20`.

### Gradients
*   **Hero Gradient:** `bg-gradient-to-r from-indigo-950 via-blue-900 to-indigo-900`.
*   **Soft Accent:** `bg-gradient-to-br from-amber-200 to-amber-400`.

## 5. Layout Rules
*   **Spacing:** Generous usage of whitespace. Sections should have `py-20` (5rem) on desktop.
*   **Container:** `max-w-7xl` centered.
*   **Radius:** `rounded-2xl` (1rem) or `rounded-3xl` (1.5rem) for large images.

## 6. Iconography
*   **Icons:** Lucide Icons (clean, crisp SVG) or Heroicons.

## 7. Animations (CSS)
*   `fade-in-up`: For sections appearing on scroll.
*   `float`: For hero elements.
*   `pulse-soft`: For CTA buttons.

---
**Tech Stack:** Tailwind CSS (via CDN for View-only implementation).
