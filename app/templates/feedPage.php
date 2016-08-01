

		<div id="bar">
			<img src="img/logo-ts.png" alt="test site logo">
			<div id="navigation">
				<div class="search-bar">
					<form class="search-form">
						<input class="search-input" type="search" placeholder="search...">
						<button class="search-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
				<a href="index.html" id="log-out">Log Out</a>
			</div>
		</div>


		<div id="content-box">
			<div id="public-projects">
				<h2>Public Projects.</h2>

				<article>
					<h2>Title</h2>
					<a href="project.html"><img src="http://placehold.it/200x200" alt="thumbnail"></a>
					<p>username  16 max</p>
					<p class="date">00/00/00</p>
				</article>

			</div>	
			<div id="my-projects">
				<h2>My Projects.</h2>

				<article>
					<h2>Title</h2>
					<a href="project.html"><img src="http://placehold.it/200x200" alt="thumbnail"></a>
					<p class="date">00/00/00</p>
				</article>	

			</div>	
		</div>

		<div id="new-project-button-mover"><button id="new-project-button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></div>
		<div  class="popup-form">	
				<form id="new-project-form">
						<h2>New Project</h2>	
						<!-- title -->
						<input type="text" name="title" value="" placeholder="Title" >
							<br><br>

						<!-- file -->  
						<input type="file" name="project-file">
							<br><br>

						<!-- image -->
						<input type="file" name="thumbnail">
							<br><br>

						<!-- url -->
						<input type="url" name="link" value="" placeholder="URL" >
							<br><br>

						<!-- licence  -->
						<p id="licence-comment"><span><i class="fa fa-bell-o" aria-hidden="true"></i></span> To keep things simple we have abbreviated all the different licences to just open or closed, however please feel free to add and further licence information in the project description.</p>
						<select name="cars">
							 <option value="open">open</option>
							 <option value="closed">closed</option>
						</select>
							<br><br>

						<!-- description  -->
						<textarea id="description-input" name="description" value="" placeholder="Description" ></textarea>
						<br><br>

						<button type="button" id="back-to-feed"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
						<button type="submit" id="new-project-submit"><i class="fa fa-check-circle" aria-hidden="true"></i></button>
				</form>

		</div>		