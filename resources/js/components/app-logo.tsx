import AppLogoIcon from './app-logo-icon';

export default function AppLogo() {
    return (
        <>
            {/* Este div ya es el cuadrado negro redondeado */}
            <div className="flex size-8 items-center justify-center dark:bg-white text-white dark:text-black">
                <AppLogoIcon className="size-5" />
            </div>
            
            <div className="ml-3 grid flex-1 text-left text-sm">
                <span className="truncate leading-tight font-bold text-base">
                    Lumina
                </span>
                <span className="truncate text-xs text-muted-foreground">
                    Instituto Superior
                </span>
            </div>
        </>
    );
}