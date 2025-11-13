
document.addEventListener('DOMContentLoaded', function() {
  // Handle sidebar toggle and adjust main content
  const sidebar = document.querySelector('custom-sidebar');
  const mainContent = document.getElementById('main-content');
  
  if (sidebar && mainContent) {
    const observer = new MutationObserver(function(mutations) {
      mutations.forEach(function(mutation) {
        if (mutation.attributeName === 'style') {
          const isMobile = window.innerWidth < 768;
          const width = sidebar.shadowRoot.querySelector(':host').style.width;
          if (isMobile) {
            mainContent.style.marginLeft = width === '250px' ? '250px' : '0';
          } else {
            mainContent.style.marginLeft = '250px';
          }
        }
      });
    });

    observer.observe(sidebar.shadowRoot.querySelector(':host'), {
      attributes: true,
      attributeFilter: ['style']
    });

    // Initial setup
    const isMobile = window.innerWidth < 768;
    if (!isMobile) {
      mainContent.style.marginLeft = '250px';
    }
  }
});

// Handle responsive behavior
window.addEventListener('resize', function() {
  const sidebar = document.querySelector('custom-sidebar');
  const mainContent = document.getElementById('main-content');
  const isMobile = window.innerWidth < 768;

  if (sidebar && mainContent) {
    if (!isMobile) {
      mainContent.style.marginLeft = '250px';
    } else {
      const width = sidebar.shadowRoot.querySelector(':host').style.width;
      mainContent.style.marginLeft = width === '250px' ? '250px' : '0';
    }
  }
});
