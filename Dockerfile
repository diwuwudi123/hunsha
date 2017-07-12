#基础镜像
FROM ubuntu
#作者和联系方式
MAINTAINER wudi "diwuwudi123@outlook.com"
#安装web服务 
RUN apt-get update
RUN apt-get install -y nginx
#开放80口
EXPOSE 80  
