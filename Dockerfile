FROM webdevops/php-nginx:8.3-alpine



# Metatadata ARGS label-schema.org

ARG VERSION
ARG VCS_URL
ARG VCS_REF
ARG BUILD_DATE



LABEL org.label-schema.build-date=$BUILD_DATE \
    org.label-schema.version=$VERSION \
    org.label-schema.url=$VCS_URL \
    org.label-schema.vcs-url=$VCS_URL \
    org.label-schema.vcs-ref=$VCS_REF


# Build project

ARG GITLAB_TOKEN

WORKDIR /app

COPY conf/bin/ /opt/docker/bin/

COPY conf/etc/ /opt/docker/etc/

COPY ./ ./

RUN apk add yarn

RUN composer install --no-scripts

RUN yarn install

RUN yarn encore production