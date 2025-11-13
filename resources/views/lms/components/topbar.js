class CustomTopbar extends HTMLElement {
  connectedCallback() {
    this.attachShadow({ mode: 'open' });
    this.shadowRoot.innerHTML = `
      <style>
        :host {
          display: block;
          background: white;
          padding: 1rem 2rem;
          box-shadow: 0 2px 4px rgba(0,0,0,0.05);
          position: fixed;
          top: 0;
          left: 250px;
          right: 0;
          z-index: 10;
          display: flex;
          justify-content: space-between;
          align-items: center;
        }
        .search {
          flex-grow: 1;
          max-width: 500px;
        }
        .search input {
          width: 100%;
          padding: 0.5rem 1rem;
          border-radius: 20px;
          border: 1px solid #e5e7eb;
        }
        .user {
          display: flex;
          align-items: center;
        }
        .avatar {
          width: 40px;
          height: 40px;
          border-radius: 50%;
          background: #e5e7eb;
          margin-left: 1rem;
          overflow: hidden;
        }
        @media (max-width: 768px) {
          :host {
            left: 70px;
          }
        }
      </style>
      <div class="search">
        <input type="text" placeholder="Search courses...">
      </div>
      <div class="user">
        <span>Hello, Student!</span>
        <div class="avatar">
          <img src="http://static.photos/people/40x40/1" width="40" height="40">
        </div>
      </div>
    `;
  }
}
customElements.define('custom-topbar', CustomTopbar);