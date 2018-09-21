<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="nl-NL">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
		<title>ASPO Ledenportaal :: {$title}</title>
		
		<!-- base stylesheets -->
		<link rel="stylesheet" href="styles/base.css" type="text/css" />
		{if $AuthLevel == 0}
			<link rel="stylesheet" href="styles/login.css" type="text/css" />
		{elseif $AuthLevel == 2}
			<link rel="stylesheet" href="styles/admin.css" type="text/css" />
		{else}
			<link rel="stylesheet" href="styles/user.css" type="text/css" />
		{/if}

		<!-- formvalidation stylesheet -->
		<link rel="stylesheet" href="styles/parsley.css" type="text/css" />

		<!-- optional styles -->
		{if isset($styles)}
			{foreach $styles as $style}
				<link rel="stylesheet" href="{$style}" type="text/css" />
			{/foreach}
		{/if}
		
		<!-- form validation scripts -->
		<script type="text/javascript" src="includes/jquery/jquery.js"></script>
		<script type="text/javascript" src="includes/parsley/parsley.js"></script>
		<script type="text/javascript" src="includes/parsley/parsley.messages.nl.js"></script>

		<!-- optional scripts -->
		{if isset($scripts)}
			{foreach $scripts as $script}
				<script type="text/javascript" src="{$script}"></script>
			{/foreach}
		{/if}

		
	</head>
	<body>