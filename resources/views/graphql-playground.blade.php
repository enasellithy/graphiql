<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GraphQL Playground</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/graphql-playground-react@1.7.28/build/static/css/index.css" />
</head>
<body>
<div id="root"></div>
<script src="https://cdn.jsdelivr.net/npm/graphql-playground-react@1.7.28/build/static/js/middleware.js"></script>
<script>
    GraphQLPlayground.init(document.getElementById('root'), {
        endpoint: "{{ $graphqlEndpoint }}",
    });
</script>
</body>
</html>
