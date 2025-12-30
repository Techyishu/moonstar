# Moonstar School - Public Website Documentation

## Overview

The Moonstar School public website is a complete, responsive, and accessible CodeIgniter 4 application featuring:

- **Home page** with hero, features, events, notices, and testimonials
- **About page** with history, mission/vision, values, and leadership
- **Academics page** with program cards for all grade levels
- **Admissions page** with online application form
- **Gallery page** with filterable grid and lightbox
- **Contact page** with contact form and information
- **Dynamic pages** rendered from database

---

## File Structure

```
app/
├── Controllers/
│   ├── PublicHome.php      # Homepage controller
│   ├── About.php           # About page controller
│   ├── Academics.php       # Academics controller
│   ├── Admissions.php      # Admissions with form processing
│   ├── Gallery.php         # Gallery controller
│   ├── Contact.php         # Contact with form processing
│   ├── Pages.php           # Dynamic pages from database
│   └── Students.php        # Admin CRUD (existing)
├── Views/
│   ├── layouts/
│   │   └── main.php        # Base layout template
│   ├── partials/
│   │   ├── navbar.php      # Navigation partial
│   │   └── footer.php      # Footer partial
│   ├── home/
│   │   └── index.php       # Homepage view
│   ├── about/
│   │   └── index.php       # About page view
│   ├── academics/
│   │   └── index.php       # Academics view
│   ├── admissions/
│   │   └── index.php       # Admissions form view
│   ├── gallery/
│   │   └── index.php       # Gallery with lightbox
│   ├── contact/
│   │   └── index.php       # Contact form view
│   └── pages/
│       └── view.php        # Dynamic page template
├── Config/
│   └── Routes.php          # Route configuration
└── Models/
    ├── EventModel.php
    ├── NoticeModel.php
    ├── TeacherModel.php
    ├── AdmissionModel.php
    ├── GalleryModel.php
    └── PageModel.php
```

---

## Routes Configuration

All routes are defined in `app/Config/Routes.php`:

### Public Routes

```php
// Homepage
$routes->get('/', 'PublicHome::index');

// About
$routes->get('about', 'About::index');

// Academics
$routes->get('academics', 'Academics::index');

// Admissions
$routes->get('admissions', 'Admissions::index');
$routes->post('admissions/submit', 'Admissions::submit');

// Gallery
$routes->get('gallery', 'Gallery::index');

// Contact
$routes->get('contact', 'Contact::index');
$routes->post('contact/submit', 'Contact::submit');

// Dynamic Pages
$routes->get('page/(:segment)', 'Pages::view/$1');
```

### Admin Routes (Future Development)

```php
$routes->group('students', function($routes) {
    $routes->get('/', 'Students::index');
    $routes->get('create', 'Students::create');
    // ... etc
});
```

---

## Page-Specific Features

### 1. Home Page (`/`)

**Controller**: `PublicHome.php`  
**View**: `app/Views/home/index.php`

**Features:**
- Hero section with CTAs (Apply for Admission, Schedule Visit)
- 3 feature cards (Academic Excellence, Modern Facilities, Nurturing Environment)
- Upcoming events strip (pulls from `events` table)
- Latest notices (pulls from `notices` table)
- Testimonials block (3 parent testimonials)
- Call to action section

**Data Sources:**
- Events: `events` table (WHERE status=1 AND event_date >= today, LIMIT 3)
- Notices: `notices` table (WHERE status=1, ORDER BY created_at DESC, LIMIT 5)

---

### 2. About Page (`/about`)

**Controller**: `About.php`  
**View**: `app/Views/about/index.php`

**Features:**
- History section with statistics
- Mission & Vision cards
- Core values (Excellence, Integrity, Compassion, Innovation)
- Leadership team cards (pulls from `teachers` table)

**Data Sources:**
- Leadership: `teachers` table (WHERE status=1, LIMIT 6)

---

### 3. Academics Page (`/academics`)

**Controller**: `Academics.php`  
**View**: `app/Views/academics/index.php`

**Features:**
- 6 program cards:
  - Early Childhood (Pre-K to K)
  - Elementary (Grades 1-5)
  - Middle School (Grades 6-8)
  - High School (Grades 9-12)
  - Arts & Music Programs
  - Athletics & Sports
- "Learn More" modal
- Call to action

---

### 4. Admissions Page (`/admissions`)

**Controller**: `Admissions.php`  
**View**: `app/Views/admissions/index.php`

**Features:**
- 4-step admission process visualization
- **Online application form** with validation
- FAQ accordion
- Form submits to `admissions` table

**Form Fields:**
- Student Information:
  - Full Name (required)
  - Date of Birth (required)
  - Gender (required)
  - Grade/Class Applying For (required)
  - Previous School (optional)
  
- Parent/Guardian Information:
  - Full Name (required)
  - Email (required, validated)
  - Phone (required)
  - Address (required)
  - Additional Comments (optional)

**Form Processing:**
1. Validates all fields
2. Generates unique application number (e.g., APP202500123)
3. Saves to `admissions` table with status 'pending'
4. Displays success message with application number

---

### 5. Gallery Page (`/gallery`)

**Controller**: `Gallery.php`  
**View**: `app/Views/gallery/index.php`

**Features:**
- Filterable grid (All, Events, Academics, Sports, Facilities)
- **Lightbox functionality** with:
  - Full-screen image viewing
  - Previous/Next navigation
  - Keyboard navigation (arrow keys, ESC to close)
  - Click outside to close
  - Image captions

**Data Sources:**
- Gallery: `gallery` table (WHERE status=1, ORDER BY display_order ASC)

**JavaScript Functions:**
- `filterGallery(category)` - Filters images by category
- `openLightbox(imageId)` - Opens lightbox
- `closeLightbox(event)` - Closes lightbox
- `changeImage(direction)` - Navigate images

---

### 6. Contact Page (`/contact`)

**Controller**: `Contact.php`  
**View**: `app/Views/contact/index.php`

**Features:**
- Contact information cards (Address, Phone, Email)
- **Contact form** with validation
- Map placeholder (with Google Maps link)
- Office hours table

**Form Fields:**
- Name (required)
- Email (required, validated)
- Phone (optional)
- Subject (required, dropdown)
- Message (required)

**Form Processing:**
- Validates fields
- Shows success message
- (In production, would save to database and send emails)

---

### 7. Dynamic Pages (`/page/{slug}`)

**Controller**: `Pages.php`  
**View**: `app/Views/pages/view.php`

**Features:**
- Renders content from `pages` table by slug
- Supports HTML content
- SEO meta tags
- Shows last updated date

**Usage:**
1. Create page in `pages` table with slug (e.g., 'privacy-policy')
2. Access at `/page/privacy-policy`

---

## Design System

### Color Palette

```css
:root {
    --primary-color: #0b72b9;      /* Moonstar Blue */
    --secondary-color: #094c7a;    /* Darker Blue */
    --accent-color: #ffd166;       /* Golden Yellow */
    --text-dark: #333333;
    --text-light: #666666;
    --bg-light: #f8f9fa;
}
```

### Typography
- Font Family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
- Headings: Bold, primary color
- Body: 1.6 line-height for readability

### Components

**Buttons:**
```html
<button class="btn btn-primary">Primary Action</button>
<button class="btn btn-accent">Secondary Action</button>
<button class="btn btn-outline-primary">Outline Button</button>
```

**Cards:**
- Borderless with shadow
- 12px border radius
- Hover effect: translateY(-8px)

**Section Title:**
```html
<div class="section-title">
    <h2>Section Name</h2>
    <p class="text-muted">Description</p>
</div>
```

---

## JavaScript Features

### 1. Mobile Menu Toggle

**Location**: `layouts/main.php`

```javascript
// Toggles mobile navigation
// Closes when clicking outside
// Auto-highlights active page
```

### 2. Form Validation

**Function**: `validateForm(formId)`

```javascript
// Validates required fields
// Validates email format
// Adds Bootstrap validation classes
// Returns true/false
```

Usage:
```html
<form onsubmit="return validateForm('myForm')" id="myForm">
```

### 3. Lightbox (Gallery)

**Functions:**
- `openLightbox(imageId)` - Opens image
- `closeLightbox(event)` - Closes lightbox
- `changeImage(direction)` - Next/Previous
- Keyboard: Arrow keys, ESC

### 4. Gallery Filter

**Function**: `filterGallery(category)`

```javascript
// Filters gallery items by category
// Shows/hides items with CSS
// Updates active filter button
```

---

## SEO Implementation

### Meta Tags

Every page includes:

```php
<meta name="description" content="<?= $meta_description ?>">
<meta name="keywords" content="moonstar, school, education...">
<meta property="og:title" content="<?= $title ?>">
<meta property="og:description" content="<?= $meta_description ?>">
```

### Semantic HTML

- `<header>`, `<nav>`, `<main>`, `<footer>`, `<article>`, `<section>`
- Proper heading hierarchy (h1 → h2 → h3)
- `<time>` for dates
- `<address>` for contact info

### Accessibility

- ARIA labels on buttons and links
- `alt` attributes on all images
- Skip to main content link
- Focus states on interactive elements
- Form labels with `for` attributes
- Required field indicators

### Breadcrumbs

```html
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Page Name</li>
    </ol>
</nav>
```

---

## Responsive Design

All pages are fully responsive using Bootstrap 5 breakpoints:

- **xs** (< 576px): Mobile phones
- **sm** (≥ 576px): Large phones
- **md** (≥ 768px): Tablets
- **lg** (≥ 992px): Small laptops
- **xl** (≥ 1200px): Desktops

### Mobile Optimizations

- Hamburger menu on mobile
- Stacked layouts
- Touch-friendly buttons
- Reduced padding/margins
- Hidden/simplified elements

---

## Database Integration

### Tables Used

1. **events** - Homepage upcoming events
2. **notices** - Homepage latest notices
3. **teachers** - About page leadership
4. **admissions** - Stores admission applications
5. **gallery** - Gallery images
6. **pages** - Dynamic page content

### Sample Data

To add sample pages:

```sql
INSERT INTO pages (title, slug, content, status, created_at, updated_at) VALUES
('Privacy Policy', 'privacy-policy', '<h2>Privacy Policy</h2><p>Content here...</p>', 1, NOW(), NOW()),
('Terms & Conditions', 'terms-conditions', '<h2>Terms</h2><p>Content here...</p>', 1, NOW(), NOW());
```

---

## Testing Checklist

- [ ] Homepage loads with events and notices
- [ ] Navigation works on all pages
- [ ] Mobile menu toggles correctly
- [ ] Admissions form submits successfully
- [ ] Contact form validates properly
- [ ] Gallery lightbox opens and navigates
- [ ] Gallery filter buttons work
- [ ] Dynamic pages load from database
- [ ] All links work correctly
- [ ] Responsive on mobile devices
- [ ] Forms show validation errors
- [ ] Success/error messages display

---

## Customization Guide

### Change Colors

Edit `app/Views/layouts/main.php`:

```css
:root {
    --primary-color: #YOUR_COLOR;
    --accent-color: #YOUR_COLOR;
}
```

### Add New Page

1. Create controller: `app/Controllers/NewPage.php`
2. Create view: `app/Views/newpage/index.php`
3. Add route: `$routes->get('newpage', 'NewPage::index');`

### Modify Navigation

Edit `app/Views/partials/navbar.php`:

```html
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('your-page') ?>">
        <i class="bi bi-icon me-1"></i>Page Name
    </a>
</li>
```

### Add Social Media Links

Edit `app/Views/partials/footer.php`:

```html
<a href="https://facebook.com/yourpage">
    <i class="bi bi-facebook"></i>
</a>
```

---

## Performance Tips

1. **Enable Caching** (in production):
   ```php
   // app/Config/Cache.php
   public string $handler = 'file';
   ```

2. **Optimize Images**:
   - Use WebP format
   - Compress before upload
   - Use `loading="lazy"` attribute

3. **Minify Assets** (production):
   - Combine CSS/JS files
   - Use CDN for Bootstrap

4. **Database Optimization**:
   - Add indexes on frequently queried columns
   - Use `limit()` on large queries

---

## Future Enhancements

- [ ] User authentication for admin panel
- [ ] WYSIWYG editor for dynamic pages
- [ ] Email notifications for forms
- [ ] Image upload for gallery
- [ ] Search functionality
- [ ] Online payment for admissions
- [ ] Student/parent portal
- [ ] Calendar integration for events
- [ ] Newsletter subscription
- [ ] Multi-language support

---

## Support & Resources

- **CodeIgniter 4 Docs**: https://codeigniter.com/user_guide/
- **Bootstrap 5 Docs**: https://getbootstrap.com/docs/5.3/
- **Bootstrap Icons**: https://icons.getbootstrap.com/

---

**Built with ❤️ for Moonstar School**
