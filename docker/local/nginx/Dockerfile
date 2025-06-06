FROM public.ecr.aws/docker/library/nginx:1.25.3-alpine3.18

ARG BUILD_ENV=local

WORKDIR /ws-laravel
RUN apk update && \
    apk add shadow nginx tzdata --no-cache && \
    cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
    apk del tzdata && \
    rm -rf /var/cache/apk/*

COPY ["./src/","./"]
COPY ["./docker/${BUILD_ENV}/nginx/config/nginx.conf", "/etc/nginx/nginx.conf"]
COPY ["./docker/${BUILD_ENV}/nginx/scripts/docker-entrypoint.sh", "/docker-entrypoint.sh"]
RUN chmod +x /docker-entrypoint.sh

EXPOSE 80

ENTRYPOINT ["/docker-entrypoint.sh"]