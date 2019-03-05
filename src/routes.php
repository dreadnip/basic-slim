<?php
// Routes

$app->get('/pages[/{id}]', function ($request, $response, $args) {

    if (isset($args['id'])) {
    	$user_object = get_user($args['id']);
    	if ($user_object) {
    		$args['user'] = $user_object;
    	} else {
    		$args['message'] = "That is not a valid user";
    	}
    } else {
    	$args['message'] = "You did not enter an ID";
    }

    return $this->view->fetch('page.twig', $args);
});

$app->get('/', function ($request, $response, $args) {

    // Render index view
    return $this->view->fetch('home.twig', $args);
});
