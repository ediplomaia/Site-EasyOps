FROM node:current-alpine3.16

WORKDIR /app
COPY . .
RUN npm install
EXPOSE 80
ENTRYPOINT ["npm", "start"]