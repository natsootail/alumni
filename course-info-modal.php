<div class="at-modal-wrapper">
	<div class="at-modal-header">
		<button class="close">&times;</button>
		<h4> Course Information </h4>
	</div>
	<div class="at-modal-content">
		<?php
		$desc['IT'] = "The Bachelor of Science in Information Technology (BSIT) program aims to producs quality graduates
			who study, analyze, design, develop, implement, and evaluate ICT solutions. The program focuses on the use of
			ICT for a variety of applications such as in business, governance, education, personal, and entertainment.
			Professional subjects include logic design, microcomputer technology, computer systems organization, networking
			technologies, and systems resource management.";
		$desc['IS'] = "Bachelor of Science in Information Systems (BSIS) program, formely known as BS in Information Management,
			aims to equip students with the knowledge, skills, and attitude in the design and implementation of solutions that
			integrate information technology with business processes. This program prepares students to be IT Professionals that
			could harness ICT as a strategic resource to meet business and organizational objectives.";
		$desc['CS'] = "The BS in Computer Science course prepares you for proficiency in designing, writing and 
			developing computer programs and computer networks.";
		$desc['MIT'] = "The Master of Information Technology degree is designed for IT professionals looking to update and
			extend their technical knowledge of advanced computing subjects, or move into a new IT specialisation. 
			Internationally recognised, it can help advance your career 
		in diverse fields such as software engineering, health, telecommunications and more.";
		$desc['LIS'] = "Bachelor of Library and Information Science (BLIS) is a four year degree program designed to provide knowledge 
			and skills in the management of library operations, the systematic organization, conservation, preservation and
			restoration of books, historical and cultural documents and other intellectual properties.";
		$desc['EMC'] = "Entertainment and Multimedia Computing is the study and use of concepts, principles, and 
			techniques of computing in the design and development of multimedia products and solutions. It includes
			various applications such as in science, entertainment, education, simulations and advertising.";
		
		$name['IS'] = "Bachelor of Science in Information System";
		$name['IT'] = "Bachelor of Science in Information Technology";
		$name['CS'] = "Bachelor of Science in Computer Science";
		$name['MIT'] = "Masters in Information Technology";
		$name['LIS'] = "Library Science";
		$name['EMC'] = "Entertainment Multimedia Computing";
		$id = $_POST['id'];
		?>
		<div class="course-info">
			<h4> <?php echo $name[$id]; ?> </h4>
			<p> <?php echo $desc[$id]; ?> </p>
		</div>
	</div>
</div>