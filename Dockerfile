FROM ubuntu:latest

# Update package lists and install wget
RUN apt-get update && apt-get install -y wget

# Download XAMPP
RUN wget https://downloads.sourceforge.net/project/xampp/XAMPP%20Linux/7.4.21/xampp-linux-x64-7.4.21-0-installer.run -O /tmp/xampp-installer.run

# Make the installer executable
RUN chmod +x /tmp/xampp-installer.run

# Run the XAMPP installer in unattended mode
RUN /tmp/xampp-installer.run --mode unattended

# Clean up
RUN rm /tmp/xampp-installer.run

# Expose necessary ports (HTTP, HTTPS, MySQL)
EXPOSE 80 443 3306

# Copy custom files to the htdocs directory
#COPY ./register /opt/lampp/htdocs/register

# Start XAMPP on container startup
CMD ["/opt/lampp/xampp start"]
