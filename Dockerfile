FROM node:15

LABEL maintainer="Derick Vigne"

RUN curl -sL https://deb.nodesource.com/setup_15.x | bash - && apt-get install -y nodejs

run mkdir /.npm  && chown -R 112:117 "/.npm"
