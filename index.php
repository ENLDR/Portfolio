<!DOCTYPE html>
<html>

<head>
  <title>Javelin Portfolio</title>
  <link rel="stylesheet" href="c.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .hidden {
      display: none;
    }

    .fade-in {
      opacity: 0;
      transition: opacity 2s ease-in-out;
    }

    .fade-in-visible {
      opacity: 1;
    }
  </style>
</head>

<body>
  <header>
    <div>
      <div class="logo">
        <img src="javelin.jpg" alt="Javelin Logo">
      </div>
      <nav>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#achievements">Achievements</a></li>
          <li><a href="#projects">Projects</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main id="home">
    <?php
      session_start();

  
  if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    
    echo '<h2>Welcome, ' . $_SESSION['username'] . '!</h2>';
    echo '<button><a href="logout.php">Logout</a></button>';
  } else {
    
    echo '
    <section class="form-box">
      <h2>User Registration</h2>
      <form action="register.php" method="post">
          Username: <input type="text" name="username" required><br>
          Password: <br><input type="password" name="password" required><br><br>
          <button type="submit">Register</button>
      </form>
    </section>
    <section class="form-box">
      <h2>User Login</h2>
    <form  action="login.php" method="post">
        Username: <input type="text" name="username" required><br>
        Password:<br> <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    </section>';
  }
  ?>
    
    <h1 class="fade-in">Welcome to Javelin Portfolio</h1>
    <p>The javelin is a field event in athletics in which athletes throw a javelin-like device as far as possible. It is
      a historical sport and has been a part of the Olympic Games since ancient times. In modern javelin throwing,
      athletes use metal or carbon fiber javelins and aim to throw them within a designated sector. Successful throwing
      requires a combination of strength, speed, and technique. Athletes must generate power through a running approach
      and employ proper mechanics for maximum distance. Throwing the javelin requires precision, focus, and an
      understanding of biomechanics. Factors such as wind direction affect strategic planning. Overall, javelin is a
      visually appealing sport that combines athleticism and strategy.</p>
    <img src="Jav.jpeg" width="50%" height="500px">
    <br><br>

    <section id="achievements">
      <h2>Our Achievements</h2>
      <ul>
        <li>First Place, Inter University Championship (2022)</li>
        <li>Gold Medal, All island school sports Championship (2019)</li>
        <li>Record Holder, All island school sports Championship (2016)</li>
      </ul>
      <button id="toggleAchievements">Show Less</button>
    </section>

    <section id="projects">
      <h2>Successful Projects</h2>
      <div id="projects-list" class="project-list"></div>
      <button id="toggleProjects">Show Projects</button><br><br>
      <h3>Add Project</h3>
      <form id="newProjectForm" method="post">
        <input type="number" name="project_id" placeholder="Project ID" required>
        <input type="text" name="project_title" placeholder="Project Title" required>
        <input type="text" name="project_description" placeholder="Project Description" required>
        <input type="url" name="image_url" placeholder="Image URL" required>
        <button type="submit">Add Project</button>
      </form><br><br>
      

      <label for="deleteProjectId">Enter Project ID to Delete:</label>
<input type="text" id="deleteProjectId" name="deleteProjectId" required>
<button id="deleteProjectBtn">Delete Project</button>

    </section>
  </main>
  <section class="form-box">
    <div>
      <form id="contactForm">
        <label for="feedback">feedback</label>
        <input type="text" id="name" name="name" placeholder="Name" required>
        <input type="email" id="email" name="email" placeholder="Email" required>
        <input type="tel" id="phone" name="phone" placeholder="Phone" required>
        <input type="text" id="message" name="message" placeholder="Message">
        <input type="submit">
      </form>
    </div>
  </section>
  <aside>
    <h2>Related Links</h2>
    <ul>
      <li><a href="https://www.youtube.com/watch?v=Ino8F3Df_2Q&t=255s">Javelin Techniques</a></li>
      <li><a href="https://mysports.lk/product/victory-sports-javelin">Training Resources</a></li>
      <li><a href="https://www.facebook.com/groups/ukjav/">Javelin Throwers Association</a></li>
    </ul>
  </aside>


  <footer id="contact">
    <div class="social-media">
      <a href="https://www.facebook.com/"><img src="fb.png" alt="Facebook"></a>
      <a href="https://twitter.com/"><img src="tw.png" alt="Twitter"></a>
      <a href="https://www.instagram.com/"><img src="in.png" alt="Instagram"></a>
    </div>
    <div class="contact-info">
      <p>Email: rlasithdilshan@gmail.com</p>
      <p>Phone: 0711859051</p>
    </div>
  </footer>

  <script>
    // Image Slider
    const images = [
      "l.jpeg",
      "j.png",
      "k.png",
      "Jav.jpeg"
    ];

    let currentIndex = 0;
    const image = document.querySelector("#home img");

    function showNextImage() {
      currentIndex = (currentIndex + 1) % images.length;
      const imageUrl = images[currentIndex];
      image.src = imageUrl;
    }

    setInterval(showNextImage, 3000);

    // Smooth Scrolling
    const navLinks = document.querySelectorAll("nav ul li a");

    for (const link of navLinks) {
      link.addEventListener("click", smoothScroll);
    }

    function smoothScroll(event) {
      event.preventDefault();
      const targetId = event.target.getAttribute("href").substr(1);
      const targetElement = document.getElementById(targetId);
      targetElement.scrollIntoView({ behavior: "smooth" });
    }

    // Toggle Achievements
    const toggleAchievementsBtn = document.getElementById("toggleAchievements");
    const achievementsSection = document.getElementById("achievements");
    const achievementsList = achievementsSection.querySelector("ul");

    toggleAchievementsBtn.addEventListener("click", () => {
      achievementsList.classList.toggle("hidden");
      if (achievementsList.classList.contains("hidden")) {
        toggleAchievementsBtn.textContent = "Show More";
      } else {
        toggleAchievementsBtn.textContent = "Show Less";
      }
    });

    const toggleProjectsBtn = document.getElementById("toggleProjects");
const projectsList = document.getElementById("projects-list");

toggleProjectsBtn.addEventListener("click", () => {
  fetch("retrieve_project.php") 
    .then(response => response.json())
    .then(data => {
      projectsList.innerHTML = '';

      for (const project of data) {
        const projectDiv = document.createElement("div");
        projectDiv.className = "project";

        const projectImage = document.createElement("img");
        projectImage.src = project.image;
        projectDiv.appendChild(projectImage);

        const projectTitle = document.createElement("h3");
        projectTitle.textContent = project.title;
        projectDiv.appendChild(projectTitle);

        const projectDescription = document.createElement("p");
        projectDescription.textContent = project.description;
        projectDiv.appendChild(projectDescription);

        projectsList.appendChild(projectDiv);
      }
    });
});



const newProjectForm = document.getElementById("newProjectForm");

newProjectForm.addEventListener("submit", (event) => {
  event.preventDefault();

  const formData = new FormData(newProjectForm);

  fetch("add_project.php", {
    method: "POST",
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.message) {
      alert(data.message);
      newProjectForm.reset();
    } else if (data.error) {
      alert(data.error);
    }
  })
  .catch(error => {
    console.error("Error:", error);
  });
});



const deleteProjectBtn = document.getElementById("deleteProjectBtn");

deleteProjectBtn.addEventListener("click", () => {
  const projectId = document.getElementById("deleteProjectId").value;
  const confirmDelete = confirm("Are you sure you want to delete this project?");
  if (confirmDelete) {
    deleteProject(projectId);
  }
});

function deleteProject(projectId) {
  
  fetch("delete_project.php", {
    method: "POST",
    body: JSON.stringify({ projectId }),
    headers: {
      "Content-Type": "application/json"
    }
  })
  .then(response => response.json())
  .then(data => {
    if (data.message) {
      alert(data.message);
      
    } else if (data.error) {
      alert(data.error);
    }
  })
  .catch(error => {
    console.error("Error:", error);
  });
}





    // Form Validation
    const contactForm = document.getElementById("contactForm");

    const emailInput = document.getElementById("email");
    const nameInput = document.getElementById("name");
    const phoneInput = document.getElementById("phone");
    const messageInput = document.getElementById("message");

    contactForm.addEventListener("submit", (event) => {
      event.preventDefault();

      if (!validateEmail(emailInput.value)) {
        alert("Please enter a valid email address.");
        return;
      }

      if (!validatePhone(phoneInput.value)) {
        alert("Please enter a valid phone number.");
        return;
      }

      var formData = new FormData(contactForm);

      // Form is valid, you can submit it or perform other actions
      // Here, we'll log the form data to the console

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          contactForm.reset();
        }
      };
      xhttp.open("POST", "process_form.php", true);
      xhttp.send(formData);

      // Reset the form
      // contactForm.reset();
    });

    function validateEmail(email) {
      // Simple email validation regex
      const emailRegex = /^\S+@\S+\.\S+$/;
      return emailRegex.test(email);
    }

    function validatePhone(phone) {
      // Simple phone number validation regex
      const phoneRegex = /^\d{10}$/;
      return phoneRegex.test(phone);
    }
    function isElementInViewport(element) {
      const rect = element.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
      );
    }

    function handleScroll() {
      const fadeElements = document.querySelectorAll('.fade-in');
      fadeElements.forEach((element) => {
        if (isElementInViewport(element)) {
          element.classList.add('fade-in-visible');
        } else {
          element.classList.remove('fade-in-visible');
        }
      });
    }

    window.addEventListener('scroll', handleScroll);
    handleScroll();

  </script>
</body>

</html>