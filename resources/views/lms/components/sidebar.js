
class CustomSidebar extends HTMLElement {
  constructor() {
    super();
    this.isMobile = window.innerWidth < 768;
    this.isOpen = false;
  }
connectedCallback() {
    this.attachShadow({ mode: 'open' });
    this.render();
    window.addEventListener('resize', () => this.handleResize());
  }

  handleResize() {
    const wasMobile = this.isMobile;
    this.isMobile = window.innerWidth < 768;
    if (wasMobile !== this.isMobile) {
      this.isOpen = !this.isMobile;
      this.render();
    }
  }

  toggleMenu() {
    this.isOpen = !this.isOpen;
    this.render();
  }

  render() {
    this.shadowRoot.innerHTML = `
      <style>
        :host {
          display: block;
          width: ${this.isMobile ? (this.isOpen ? '250px' : '0') : '250px'};
          background: #4f46e5;
          color: white;
          height: 100vh;
          position: fixed;
          left: 0;
          top: 0;
          transition: all 0.3s;
          z-index: 100;
          overflow: hidden;
        }
        .hamburger {
          display: ${this.isMobile ? 'block' : 'none'};
          position: fixed;
          left: 15px;
          top: 15px;
          cursor: pointer;
          z-index: 101;
          background: #4f46e5;
          padding: 10px;
          border-radius: 5px;
        }
.hamburger span {
          display: block;
          width: 25px;
          height: 3px;
          margin: 5px 0;
          background: white;
          transition: all 0.3s;
        }
        .logo {
          padding: 1.5rem;
          font-size: 1.5rem;
          font-weight: bold;
          border-bottom: 1px solid rgba(255,255,255,0.1);
          position: relative;
          white-space: nowrap;
        }
.menu {
          padding: 1rem 0;
        }
        .menu-item {
          padding: 0.75rem 1.5rem;
          display: flex;
          align-items: center;
          cursor: pointer;
          transition: all 0.2s;
          text-decoration: none;
          color: white;
        }
.menu-item:hover {
          background: rgba(255,255,255,0.1);
        }
        .menu-item i {
          margin-right: 0.75rem;
          width: 24px;
          text-align: center;
        }
        .menu-item span {
          display: inline;
        }
</style>
      <div class="logo">
        ${this.isOpen ? 'BrainyBuddies' : ''}
        <div class="hamburger" id="hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
<div class="menu">
        <a href="dashboard.html" class="menu-item">
          <i>📚</i><span>My Courses</span>
        </a>
        <a href="progress.html" class="menu-item">
          <i>📊</i><span>Progress</span>
        </a>
        <a href="goals.html" class="menu-item">
          <i>🎯</i><span>Goals</span>
        </a>
        <a href="achievements.html" class="menu-item">
          <i>🏆</i><span>Achievements</span>
        </a>
        <a href="settings.html" class="menu-item">
          <i>⚙️</i><span>Settings</span>
        </a>
      </div>
    `;

    if (this.isMobile) {
      this.shadowRoot.getElementById('hamburger').addEventListener('click', () => this.toggleMenu());
    }
  }
}
customElements.define('custom-sidebar', CustomSidebar);