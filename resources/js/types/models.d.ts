export type Blog = {
    // columns
    id: number;
    name: string;
    slug: string;
    description_short: string | null;
    description_long: string | null;
    thumbnail: string | null;
    carousel: Array<unknown> | null;
    content: string | null;
    tags: Array<unknown> | null;
    related_projects: Array<unknown> | null;
    related_services: Array<unknown> | null;
    related_products: Array<unknown> | null;
    related_blogs: Array<unknown> | null;
    created_at: string | null;
    updated_at: string | null;
    deleted_at: string | null;
};

export type HomePage = {
    // columns
    id: number;
    key: string;
    value: string | null;
    hint: string | null;
    sort_order: number | null;
    image: string | null;
    created_at: string | null;
    updated_at: string | null;
};

export type Product = {
    // columns
    id: number;
    name: string;
    description_short: string | null;
    description_long: string | null;
    thumbnail: string | null;
    carousel: Array<unknown> | null;
    content: string | null;
    tags: Array<unknown> | null;
    related_projects: Array<unknown> | null;
    related_services: Array<unknown> | null;
    related_products: Array<unknown> | null;
    related_blogs: Array<unknown> | null;
    created_at: string | null;
    updated_at: string | null;
    deleted_at: string | null;
};

export type Project = {
    // columns
    id: number;
    name: string;
    description_short: string | null;
    description_long: string | null;
    thumbnail: string | null;
    carousel: Array<unknown> | null;
    content: string | null;
    tags: Array<unknown> | null;
    related_projects: Array<unknown> | null;
    related_services: Array<unknown> | null;
    related_products: Array<unknown> | null;
    related_blogs: Array<unknown> | null;
    created_at: string | null;
    updated_at: string | null;
    deleted_at: string | null;
};

export type Service = {
    // columns
    id: number;
    name: string;
    description_short: string | null;
    description_long: string | null;
    icon: string | null;
    scope: string | null;
    thumbnail: string | null;
    carousel: Array<unknown> | null;
    content: string | null;
    tags: Array<unknown> | null;
    related_projects: Array<unknown> | null;
    related_services: Array<unknown> | null;
    related_products: Array<unknown> | null;
    related_blogs: Array<unknown> | null;
    created_at: string | null;
    updated_at: string | null;
    deleted_at: string | null;
};

export type User = {
    // columns
    id: number;
    name: string;
    email: string;
    email_verified_at: string | null;
    password?: string;
    two_factor_secret?: string | null;
    two_factor_recovery_codes?: string | null;
    two_factor_confirmed_at: string | null;
    remember_token?: string | null;
    created_at: string | null;
    updated_at: string | null;
    // relations
    notifications: DatabaseNotification[];
    passkeys: Passkey[];
    // counts
    notifications_count: number;
    passkeys_count: number;
    // exists
    notifications_exists: boolean;
    passkeys_exists: boolean;
};
