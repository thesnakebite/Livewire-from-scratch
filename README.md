# 📝 Livewire From Scratch

Un sistema de gestión de artículos moderno construido con Laravel 12 y Livewire 3, desarrollado desde cero para demostrar las mejores prácticas del ecosistema Laravel moderno.

## ✨ Características

- **🔐 Autenticación Completa**: Sistema de registro, login y gestión de usuarios
- **📄 Gestión de Artículos**: CRUD completo para artículos con soporte de imágenes
- **🔍 Búsqueda Avanzada**: Sistema de búsqueda en tiempo real
- **📊 Dashboard Interactivo**: Panel de control con estadísticas y accesos rápidos
- **⚙️ Configuración de Usuario**: Gestión de perfil, contraseña y apariencia
- **🌙 Modo Oscuro**: Soporte completo para tema claro/oscuro
- **📱 Responsive**: Diseño adaptable para todos los dispositivos

## 🛠️ Stack Tecnológico

### Backend
- **PHP**: 8.3.24
- **Laravel**: 12.26.3
- **Livewire**: 3.6.4 (Interactividad en tiempo real)
- **Volt**: 1.7.2 (Componentes funcionales de Livewire)
- **SQLite**: Base de datos ligera

### Frontend
- **Tailwind CSS**: 4.1.11 (Estilos)
- **Flux UI**: 2.2.6 (Componentes UI para Livewire)
- **Alpine.js**: Incluido con Livewire (Interactividad JS)

### Herramientas de Desarrollo
- **Laravel Pint**: 1.24.0 (Formateador de código)
- **Pest**: 3.8.4 (Testing framework)
- **Laravel Sail**: 1.44.0 (Entorno Docker)

## 📋 Requisitos

- PHP 8.3+
- Composer
- Node.js & NPM
- SQLite (o MySQL/PostgreSQL)

## 🚀 Instalación

### 1. Clonar el repositorio
```bash
git clone <url-del-repositorio>
cd livewire-from-scratch
```

### 2. Instalar dependencias PHP
```bash
composer install
```

### 3. Instalar dependencias NPM
```bash
npm install
```

### 4. Configurar entorno
```bash
# Copiar archivo de configuración
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

### 5. Configurar base de datos
```bash
# Crear base de datos SQLite
touch database/database.sqlite

# Ejecutar migraciones
php artisan migrate --seed
```

### 6. Compilar assets
```bash
# Para desarrollo
npm run dev

# Para producción
npm run build
```

### 7. Iniciar servidor
```bash
php artisan serve
```

La aplicación estará disponible en `http://localhost:8000`

## 🏗️ Arquitectura del Proyecto

### Estructura de Rutas
- **Públicas**: Inicio, búsqueda, visualización de artículos
- **Privadas**: Dashboard, gestión de artículos, configuraciones

### Componentes Livewire
- `Greeter`: Página de inicio
- `Search`: Búsqueda de artículos
- `ShowArticle`: Visualización de artículos
- `ArticleCreate`: Creación de artículos
- `ArticleEdit`: Edición de artículos
- `Settings/*`: Configuraciones de usuario

### Modelos
- `User`: Gestión de usuarios
- `Article`: Artículos con imágenes y estados
- `Greeting`: Mensajes de bienvenida

## 🧪 Testing

```bash
# Ejecutar todos los tests
php artisan test

# Ejecutar tests específicos
php artisan test --filter=ArticleTest

# Ejecutar con cobertura
php artisan test --coverage
```

## 🎨 Estilos y Formateado

```bash
# Formatear código PHP
vendor/bin/pint

# Verificar estilo
vendor/bin/pint --test
```

## 📱 Características Destacadas

### Dashboard Interactivo
- Estadísticas en tiempo real de artículos
- Acciones rápidas para navegación
- Lista de artículos recientes
- Indicadores de estado (publicado/borrador)

### Gestión de Artículos
- Editor WYSIWYG
- Subida de imágenes
- Estados de publicación
- Sistema de notificaciones

### Búsqueda Avanzada
- Búsqueda en tiempo real
- Filtros por estado
- Resultados paginados
- Interfaz responsive

### Sistema de Configuración
- Perfil de usuario
- Cambio de contraseña
- Configuración de apariencia
- Preferencias personalizadas

## 🌙 Modo Oscuro

La aplicación incluye soporte completo para modo oscuro usando Tailwind CSS:
- Detección automática de preferencias del sistema
- Alternancia manual
- Persistencia de preferencias

## 🔧 Configuración

### Variables de Entorno Principales
```env
APP_NAME="Livewire From Scratch"
APP_ENV=local
APP_DEBUG=true
DB_CONNECTION=sqlite
```

### Personalización
- Modifica `resources/views/components/layouts/app.blade.php` para cambiar el layout
- Personaliza estilos en `resources/css/app.css`
- Configura Tailwind en `tailwind.config.js`

## 🤝 Contribución

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/amazing-feature`)
3. Commit tus cambios (`git commit -m 'Add amazing feature'`)
4. Push a la rama (`git push origin feature/amazing-feature`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 🙏 Agradecimientos

- **Laravel Team** por el increíble framework
- **Livewire Team** por la interactividad sin JavaScript
- **Tailwind CSS** por el sistema de utilidades
- **Flux UI** por los componentes elegantes

## 📞 Soporte

Si tienes preguntas o necesitas ayuda:
- Abre un [Issue](../../issues) en GitHub
- Consulta la [documentación de Laravel](https://laravel.com/docs)
- Revisa la [documentación de Livewire](https://livewire.laravel.com)

---

**Desarrollado con ❤️ usando el ecosistema Laravel moderno**