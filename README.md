Quick Start
-----------
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/app \
    -w /app \
    --env-file .env \
    --name shopping-watcher \
    shopping-watcher \
    php start.php
```