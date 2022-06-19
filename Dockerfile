FROM node:14

WORKDIR /app
COPY . .
RUN npm install
EXPOSE 80
ENTRYPOINT ["npm", "start"]