document.addEventListener("DOMContentLoaded", function () {
  const container = document.getElementById('projects');
  const projectAPI = 'https://api.rndio.my.id/project';

  fetch(projectAPI, {
      method: 'GET'
    })
    .then(response => response.json())
    .then(data => renderProjects(data, container))
    .catch(error => console.error(error));


  function renderProjects(projects, container) {
    container.classList.remove('d-none');
    const projectCards = projects.map(project => {
      const cardContainer = document.createElement('div');
      cardContainer.classList.add('col-12', 'col-md-6', 'col-lg-4');
      cardContainer.innerHTML = `
        <div class="card border-0 shadow-sm project-card ${project.is_featured ? 'featured' : ''} h-100">
          <div class="card-header">
            <img src="${project.image}" class="card-img-top" alt="${project.name}">
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <div class="col-10">
                <div class="small">${project.category}</div>
                <h5 class="card-title fw-bold">${project.name}</h5>
              </div>
              <div class="d-flex gap-2">
                ${project.link ? `<a class="link" href="${project.link}"><i class="ri-share-box-line"></i></a>` : ''}
                ${project.link_github ? `<a class="link" href="${project.link_github}"><i class="ri-github-line"></i></a>` : ''}
              </div>
            </div>
            <div class="mb-auto d-flex flex-wrap gap-1">
              ${project.techstacks.map(techstack => `<span class="badge bg-dark rounded-0 px-2">${techstack.name}</span>`).join('')}
            </div>
            <hr>
            <p class="card-text text-muted small">${project.description}</p>
          </div>
        </div>
      `;
      return cardContainer;
    });
    container.innerHTML = '';
    projectCards.forEach(card => container.appendChild(card));
  }
});