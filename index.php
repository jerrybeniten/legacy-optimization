<?php

// Define ROOT directory constant
define('ROOT', __DIR__);

// Include necessary files once
require_once(ROOT . '/utils/NewsManager.php');
require_once(ROOT . '/utils/CommentManager.php');

// Get instances of managers
$newsManager = NewsManager::getInstance();
$commentManager = CommentManager::getInstance();

// Retrieve all news and comments once
$allNews = $newsManager->listNews();
$allComments = $commentManager->listComments();

// Iterate through each news item
foreach ($allNews as $news) {
	// Output news title and body
	echo "############ NEWS " . $news->getTitle() . " ############\n";
	echo $news->getBody() . "\n";

	// Iterate through comments for the current news item
	foreach ($allComments as $comment) {
		if ($comment->getNewsId() == $news->getId()) {
			// Output comment details
			echo "Comment " . $comment->getId() . " : " . $comment->getBody() . "\n";
		}
	}
}

/*

Bad Habbits found, Optimizations Made:

1. 	Reduced getInstance() Calls: Instances of NewsManager and CommentManager are stored in variables
	($newsManager and $commentManager) to avoid repeated calls to getInstance(). This improves performance
	slightly by reducing function call overhead.

2. 	Single listComments() Call: The comments are fetched once using $commentManager->listComments() and
	stored in $comments. This minimizes repeated database queries and improves efficiency, especially if
	listComments() involves significant database operations.

3. 	Code Readability: Removed unnecessary parentheses in echo statements for better readability.

4. 	Comments: Added comments where necessary to clarify what each section of the code is doing.
	This improves code maintenance and readability for future developers.

5. 	Removed Unused Code: Removed unused variables ($c) and unnecessary comments to streamline the code further.

6. 	Speed Improvement: By reducing database calls and optimizing the loop structure, the code should execute more
	efficiently, especially in scenarios with a large number of news items and comments.
*/