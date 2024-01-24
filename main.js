document.addEventListener('DOMContentLoaded', function () {
    var menuIcon = document.getElementById('menu-icon');
    var menu = document.getElementById('menu');
  
    menuIcon.addEventListener('click', function () {
      if (menu.style.display === 'none' || menu.style.display === '') {
        menu.style.display = 'block';
      } else {
        menu.style.display = 'none';
      }
    });
  });
  
  function openTool(toolId) {
    var toolModal = document.getElementById(toolId);
    toolModal.style.display = 'block';
  }
  
  function closeTool(toolId) {
    var toolModal = document.getElementById(toolId);
    toolModal.style.display = 'none';
  }
