pipeline {
  agent none
  stages {
    stage('Setup Environment') {
      agent {
        docker { image 'composer' }
      }
      steps {
        sh "composer install --no-ansi --dev"
        sh "cp .env.example .env"
        sh "php artisan key:generate"
      }
    }

    stage('Compile Front End Assets') {
      agent { dockerfile true }
      steps {
        sh 'npm install'
        sh "npm run prod"
      }
    }

    stage('Run Tests') {
      agent {
        docker {
          image 'php'
        }
      }
      steps {
        withCredentials([string(credentialsId: 'e78d2ba7-1687-444a-88cf-1f786bdf512f', variable: 'OCTOPRINT_URL'), string(credentialsId: '91e37824-b17e-4b68-b6d4-55504af9eaa8', variable: 'OCTOPRINT_API_KEY')]) {
          sh './vendor/bin/phpunit'
        }
      }
    }
  }
}
