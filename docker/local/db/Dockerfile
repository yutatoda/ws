FROM public.ecr.aws/docker/library/mysql:8.0

## -- Build variables -- 
ARG ENVIRONMENT="local"

## -- Build --
COPY ./docker/${ENVIRONMENT}/db/config/my.conf /etc/my.conf