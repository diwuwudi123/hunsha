FROM ubuntu  #基础镜像
MAINTAINER wudi "diwuwudi123@outlook.com"  #作者和联系方式
RUN apt-get update
RUN apt-get install -y nginx #安装web服务
EXPOSE 80  #开放80口